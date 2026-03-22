<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddAcount extends Component
{
    use WithFileUploads;

    public $accountsType, $name, $email, $contactnumber, $accountDP, $password, $password_confirmation;
    public $tempImageUrl; // For image preview

    protected $rules = [
        'name' => 'required|string|max:255',
        'accountsType' => 'required|string|max:255',
        'contactnumber' => 'required|string|max:255',
        'email' => 'required|string|lowercase|email|max:255|unique:users,email',
        'password' => 'required|confirmed|min:8',
        'accountDP' => 'required|image|max:1024', // 1MB max
    ];

    protected $messages = [
        'accountDP.required' => 'Please select a profile picture.',
        'accountDP.image' => 'The file must be an image.',
        'accountDP.max' => 'The image size must not exceed 1MB.',
        'email.unique' => 'This email is already registered.',
        'password.confirmed' => 'Password confirmation does not match.',
        'password.min' => 'Password must be at least 8 characters.',
    ];

    // Automatically validate when file is selected
    public function updatedAccountDP()
    {
        $this->validateOnly('accountDP');
        
        // Generate temporary URL for preview
        if ($this->accountDP) {
            try {
                $this->tempImageUrl = $this->accountDP->temporaryUrl();
            } catch (\Exception $e) {
                // Fallback if temporary URL fails
                $this->tempImageUrl = null;
                Log::warning('Failed to generate temporary URL: ' . $e->getMessage());
            }
        }
    }

    // Auto-update validation for other fields
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveUser()
    {
        // Validate all fields
        $validatedData = $this->validate();

        try {
            // Check if file exists
            if (!$this->accountDP) {
                session()->flash('error', 'No profile picture uploaded.');
                return;
            }

            // Log file info for debugging
            Log::info('File uploaded:', [
                'original_name' => $this->accountDP->getClientOriginalName(),
                'size' => $this->accountDP->getSize(),
                'mime' => $this->accountDP->getMimeType(),
                'extension' => $this->accountDP->getClientOriginalExtension()
            ]);

            // Generate unique filename
            $filename = time() . '_' . uniqid() . '.' . $this->accountDP->getClientOriginalExtension();
            
            // Store the file in 'public/profiles' directory
            $path = $this->accountDP->storeAs('profiles', $filename, 'dpImageModDilshan');
           
            // Check if file was stored successfully
            if (!$path) {
                session()->flash('error', 'Failed to store the profile picture.');
                return;
            }

            Log::info('File stored successfully at: ' . $path);

            // Create user with proper data - store the path without 'public/' prefix
            $user = User::create([
                'name' => $this->name,
                'accountsType' => $this->accountsType,
                'contactnumber' => $this->contactnumber,
                'accountDP' =>  $filename, // This will be 'profiles/filename.jpg'
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            Log::info('User created successfully with ID: ' . $user->id . ' and accountDP: ' . $user->accountDP);

            // Reset form fields
            $this->reset([
                'accountsType', 
                'name', 
                'email', 
                'contactnumber', 
                'accountDP', 
                'password', 
                'password_confirmation',
                'tempImageUrl'
            ]);

            // Show success message
            session()->flash('success', 'Account registered successfully!');
            
            // Emit event for parent component
            $this->dispatch('account-added');

        } catch (\Exception $e) {
            // Log the error
            Log::error('Error creating account: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Handle any errors
            session()->flash('error', 'Error creating account: ' . $e->getMessage());
        }
    }

    // Clear the uploaded file
    public function removeImage()
    {
        $this->reset('accountDP', 'tempImageUrl');
    }

    public function render()
    {
        return view('livewire.admin-add-acount');
    }
}