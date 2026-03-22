{{-- <style>
  .customimg {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.76)),
    url('../image/dshbord.webp');
} --}}

{{-- </style> --}}

<div class="w-[100%] h-[100%]  m-auto bg-black/10 overflow-y-scroll scrollbar-custom ">
    {{-- <ul class="w-full">
        @if (Auth::user()->accountsType =="Admin")
            <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
                <a href="{{ route('admindashbord') }}" class="flex items-center w-full h-full text-sm">
    <i class="bi bi-speedometer2 mr-2"></i> Dashboard
    </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('createnew') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-person-plus-fill mr-2"></i> Create Account
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('trip') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-geo-alt-fill mr-2"></i> Trip Management
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('boat') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-boat-fill mr-2"></i> Boat Management
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('users') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-people-fill mr-2"></i> User Management
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('expenses') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-cash-stack mr-2"></i> Expenses
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('report') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-bar-chart-line-fill mr-2"></i> Report
        </a>
    </li>

    @elseif (Auth::user()->accountsType =="Boat")
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('boatOverview') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-speedometer2 mr-2"></i> Boat Overview
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('trips') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-geo-alt-fill mr-2"></i> Trips
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('expenses') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-cash-stack mr-2"></i> Expenses
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('revenue') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-piggy-bank-fill mr-2"></i> Revenue
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('catchData') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-basket-fill mr-2"></i> Catch Data
        </a>
    </li>

    @elseif (Auth::user()->accountsType =="Fisherman")
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('fishermanDashboard') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-speedometer2 mr-2"></i> Dashboard
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('trips') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-geo-alt-fill mr-2"></i> Trips
        </a>
    </li>
    <li class="flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
        <a href="{{ route('payments') }}" class="flex items-center w-full h-full text-sm">
            <i class="bi bi-credit-card-fill mr-2"></i> Payments
        </a>
    </li>
    @endif
    </ul> --}}
    <ul class="w-full">
        @if (Auth::user()->accountsType =="Admin")
        <li class="admindashbord flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('admindashbord') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-speedometer2 mr-2"></i> Dashboard
            </a>

        </li>
        <li class="createnew flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('createnew') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-person-plus-fill mr-2"></i> Create Account
            </a>
        </li>
        <li class="trip flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('trip') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-geo-alt-fill mr-2"></i> Trip Management
            </a>
        </li>
        {{-- <li class="Boatmgt flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
                <a href="{{ route('boatadmin') }}" class="flex items-center w-full h-full text-sm">
        <i class="bi bi-life-preserver mr-2"></i> Boat Management
        </a>
        </li> --}}
        <li class="UserManagement flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('usermgt') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-people-fill mr-2"></i> User Management
            </a>
        </li>


        {{--
       <li class="UserManagement flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
    <a href="{{ route('usermgt') }}" class="flex items-center w-full h-full text-sm">
        <i class="bi bi-receipt-cutoff mr-2"></i> Add Expenses
        </a>
        </li> --}}

        <li class="tripAdmin flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('admintrip') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-map-fill mr-2"></i> Create Trip
            </a>
        </li>


        {{-- <li class=" flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
    <a href="{{ route('usermgt') }}" class="flex items-center w-full h-full text-sm">
        <i class="bi bi-person-plus mr-2"></i> Add Boat Crew
        </a>
        </li> --}}



        <li class="Expenses flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('adminexpenses') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-cash-stack mr-2"></i> Expenses
            </a>
        </li>

        {{--

        <li class="Revenue flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
    <a href="{{ route('adminrev') }}" wire:navigate class="flex items-center w-full h-full text-sm">
        <i class="bi bi-piggy-bank-fill mr-2"></i> Revenue
        </a>
        </li> --}}

        <li class="Report flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('report') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-bar-chart-line-fill mr-2"></i> Report
            </a>
        </li>

        @elseif (Auth::user()->accountsType =="Boat")
        <li class="BoatOver flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="/boatdashboard" {{-- wire:navigate  --}} class="flex items-center w-full h-full text-sm">
                <i class="bi bi-speedometer2 mr-2"></i> Boat Overview
            </a>
        </li>
        <li class="Trips flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="/tripsb" {{-- wire:navigate  --}} class="flex items-center w-full h-full text-sm">
                <i class="bi bi-geo-alt-fill mr-2"></i> Trips
            </a>
        </li>
        <li class="ATC flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="/addcrew" {{-- wire:navigate --}} class="flex items-center w-full h-full text-sm">
                <i class="bi bi-people-fill mr-2"></i> Add Trip Crew
            </a>
        </li>
        <li class="Expenses flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="/expenses" {{-- wire:navigate --}} class="flex items-center w-full h-full text-sm">
                <i class="bi bi-cash-stack mr-2"></i> Expenses
            </a>
        </li>
        {{-- <li class="Revenue flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
                <a href="/revenue" wire:navigate class="flex items-center w-full h-full text-sm">
                    <i class="bi bi-piggy-bank-fill mr-2"></i> Revenue
                </a>
            </li> --}}
        <li class="Catch flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="/catchdata" {{-- wire:navigate  --}} class="flex items-center w-full h-full text-sm">
                <i class="bi bi-basket-fill mr-2"></i> Catch Data
            </a>
        </li>


 <li class="Catch flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="/prediction" {{-- wire:navigate  --}} class="flex items-center w-full h-full text-sm">
                <i class="bi bi-journal-arrow-up mr-2"></i>Info Update
            </a>
        </li>

      <li class="Catch flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="/maiapplication" {{-- wire:navigate  --}} class="flex items-center w-full h-full text-sm">
                <i class="bi bi-graph-up-arrow mr-2"></i>AI Predictor
            </a>
        </li>

        


        @elseif (Auth::user()->accountsType =="Fisherman")
        <li class="Dashboardfish flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('report') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-speedometer2 mr-2"></i> Dashboard
            </a>
        </li>
        <li class="Tripsfish flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('report') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-geo-alt-fill mr-2"></i> Trips
            </a>
        </li>
        <li class="Payments flex items-center justify-center px-5 w-full h-10 text-center transition border border-gray-300 hover:bg-gray-100">
            <a href="{{ route('report') }}" class="flex items-center w-full h-full text-sm">
                <i class="bi bi-credit-card-fill mr-2"></i> Payments
            </a>
        </li>
        @endif
    </ul>

</div>

{{-- **Boat Management System - Wireframe Overview**

## **1. Admin Dashboard Wireframe**




### **Sidebar Menu:**
- **Dashboard** (Overview of system stats)
- **Boat Management**
  - View All Boats
  - Add/Edit/Delete Boats
- **User Management**
  - View All Users
  - Add/Edit/Delete Users
- **Trip Management**
  - View All Trips
  - Add/Update/Delete Trips
- **Payments**
  - View Payments (Paid/Pending)
  - Approve Payments
- **Expenses**
  - View/Add Expenses (Fuel, Maintenance, etc.)
- **Reports**
  - View Revenue & Expense Reports
- **Settings**
  - System Settings

### **Navbar Menu:**
- **Home** (Dashboard Overview)
- **Notifications** (Trip Updates, Payments, Alerts)
- **Search** (Search Boats, Users, Trips)
- **Profile** (Admin Profile Settings)
- **Logout**

### **Wireframe Graph Representation:**
```
+----------------------------------------+
|   Admin Dashboard                     |
+----------------------------------------+
| Sidebar      |   Main Dashboard Area  |
|-------------|-------------------------|
| Dashboard   |  Total Boats: X         |
| Boats       |  Total Trips: X         |
| Users       |  Revenue: X LKR         |
| Trips       |  Expenses: X LKR        |
| Payments    |  Active Trips: X        |
| Expenses    |                         |
| Reports     |  [Graph: Trips Stats]   |
| Settings    |  [Graph: Revenue vs Exp]|
+----------------------------------------+
```

---

## **2. Fisherman Dashboard Wireframe**

### **Sidebar Menu:**
- **Dashboard** (Personal Overview: My Trips, Catches, Payments)
- **Trips**
  - Upcoming & Past Trips
  - Trip Details
- **Catch Records**
  - Add/View Fish Caught
- **Payments**
  - View Payment Status
- **Emergency Alerts**
  - View Emergency Warnings
- **Profile**
  - Update Fisherman Details

### **Navbar Menu:**
- **Home** (Dashboard)
- **Notifications** (Trip & Payment Updates)
- **Search** (Search for Trips or Boats)
- **Profile** (Edit Profile)
- **Logout**

### **Wireframe Graph Representation:**
```
+--------------------------------------+
|   Fisherman Dashboard               |
+--------------------------------------+
| Sidebar    |   Main Dashboard Area  |
|-----------|-------------------------|
| Dashboard |  My Upcoming Trips: X   |
| Trips     |  Past Trips: X          |
| Catches   |  Total Fish Caught: X   |
| Payments  |  Pending Payments: X LKR|
| Emergency |                         |
| Profile   |  [Graph: Catch Stats]   |
+--------------------------------------+
```

---

## **3. Boat Account Dashboard Wireframe**

### **Sidebar Menu:**
- **Boat Overview** (View boat details & status)
- **Trips**
  - View/Manage Boat’s Trips
- **Expenses**
  - Add/View Boat Expenses (Fuel, Maintenance, Crew Payments)
- **Revenue**
  - View Boat’s Earnings (Pending/Completed Payments)
- **Catch Data**
  - View Fish Caught Details
- **Profile**
  - Update Boat Owner Details

### **Navbar Menu:**
- **Home** (Dashboard)
- **Notifications** (Trip, Expense, Payment Alerts)
- **Search** (Search for Trips, Payments)
- **Profile** (Edit Profile)
- **Logout**

### **Wireframe Graph Representation:**
```
+--------------------------------------+
|   Boat Account Dashboard            |
+--------------------------------------+
| Sidebar    |   Main Dashboard Area  |
|-----------|-------------------------|
| Overview  |  Boat Status: Active    |
| Trips     |  Upcoming Trips: X      |
| Expenses  |  Fuel Cost: X LKR       |
| Revenue   |  Total Earnings: X LKR  |
| Catches   |  Total Weight: X KG     |
| Profile   |                         |
|           |  [Graph: Revenue Trends]|
+--------------------------------------+
```

---

### **UI/UX Considerations:**
- **Sidebar:** Icons for each menu (Boat, User, Trips, etc.), collapsible for better space usage.
- **Navbar:** Sticky top bar with essential actions (Profile, Search, Notifications, Logout).
- **Graphical Data:** Use visual elements like bar charts and pie charts for trip statistics, revenue, and expenses.
- **Responsive Design:** Ensure it works well on both desktop and mobile.

**Would you like a UI design suggestion based on Tailwind CSS or another framework?** 😊 --}}



{{--
<div class="w-full h-full bg-[#fafbfc] border-r border-gray-100/80 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300/50 scrollbar-track-transparent">
    <ul class="space-y-1 p-2.5">
        @if (Auth::user()->accountsType == "Admin")
            <!-- Admin Menu - Professional Light -->
            <li>
                <a href="{{ route('admindashbord') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
<div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-blue-50/60 group-hover:bg-blue-100/50 transition-colors">
    <i class="bi bi-speedometer2 text-blue-500/80 text-[0.925rem]"></i>
</div>
<span class="relative">
    Dashboard
    <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-blue-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
</span>
<span class="ml-auto text-xs text-gray-400/80 font-normal">⌘1</span>
</a>
</li>

<li>
    <a href="{{ route('createnew') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-purple-50/60 group-hover:bg-purple-100/50 transition-colors">
            <i class="bi bi-person-plus-fill text-purple-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Create Account
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-purple-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="{{ route('trip') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-green-50/60 group-hover:bg-green-100/50 transition-colors">
            <i class="bi bi-geo-alt-fill text-green-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Trip Management
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-green-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="{{ route('boatadmin') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-cyan-50/60 group-hover:bg-cyan-100/50 transition-colors">
            <i class="bi bi-life-preserver text-cyan-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Boat Management
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-cyan-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="{{ route('usermgt') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-yellow-50/60 group-hover:bg-yellow-100/50 transition-colors">
            <i class="bi bi-people-fill text-yellow-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            User Management
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-yellow-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="{{ route('adminexpenses') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-red-50/60 group-hover:bg-red-100/50 transition-colors">
            <i class="bi bi-cash-stack text-red-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Expenses
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-red-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="{{ route('report') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-indigo-50/60 group-hover:bg-indigo-100/50 transition-colors">
            <i class="bi bi-bar-chart-line-fill text-indigo-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Report
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-indigo-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

@elseif (Auth::user()->accountsType == "Boat")
<!-- Boat Menu - Professional Light -->
<li>
    <a href="/boatdashboard" wire:navigate class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-blue-50/60 group-hover:bg-blue-100/50 transition-colors">
            <i class="bi bi-speedometer2 text-blue-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Boat Overview
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-blue-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="/tripsb" wire:navigate class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-green-50/60 group-hover:bg-green-100/50 transition-colors">
            <i class="bi bi-geo-alt-fill text-green-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Trips
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-green-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="/expenses" wire:navigate class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-red-50/60 group-hover:bg-red-100/50 transition-colors">
            <i class="bi bi-cash-stack text-red-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Expenses
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-red-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="/revenue" wire:navigate class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-emerald-50/60 group-hover:bg-emerald-100/50 transition-colors">
            <i class="bi bi-piggy-bank-fill text-emerald-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Revenue
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-emerald-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="/catchdata" wire:navigate class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-amber-50/60 group-hover:bg-amber-100/50 transition-colors">
            <i class="bi bi-basket-fill text-amber-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Catch Data
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-amber-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

@elseif (Auth::user()->accountsType == "Fisherman")
<!-- Fisherman Menu - Professional Light -->
<li>
    <a href="{{ route('report') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-blue-50/60 group-hover:bg-blue-100/50 transition-colors">
            <i class="bi bi-speedometer2 text-blue-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Dashboard
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-blue-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="{{ route('report') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-green-50/60 group-hover:bg-green-100/50 transition-colors">
            <i class="bi bi-geo-alt-fill text-green-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Trips
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-green-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>

<li>
    <a href="{{ route('report') }}" class="flex items-center px-3 py-2 rounded-lg text-[0.835rem] font-medium tracking-wide transition-all duration-250 hover:bg-white hover:shadow-[0_1px_2px_rgba(0,0,0,0.03)] text-gray-600 hover:text-gray-900 group">
        <div class="w-5 h-5 flex items-center justify-center mr-3 rounded-[5px] bg-purple-50/60 group-hover:bg-purple-100/50 transition-colors">
            <i class="bi bi-credit-card-fill text-purple-500/80 text-[0.925rem]"></i>
        </div>
        <span class="relative">
            Payments
            <span class="absolute -bottom-0.5 left-0 w-0 h-[1.5px] bg-purple-400/80 transition-all duration-300 group-hover:w-[90%]"></span>
        </span>
    </a>
</li>
@endif
</ul>
</div> --}}
