<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-black dark:bg-gray-800">
      <a href="{{ route('admin.home') }}" class="flex items-center ps-2.5 mb-5">
         <img src="{{ asset('storage/logo.png') }}" class="h-6 me-3 sm:h-7" alt="Matador Logo"/>
         <span class="self-center text-xl font-semibold whitespace-nowrap text-gray-100">Matador</span>
      </a>
      <hr>
      <ul class="space-y-2 font-medium mt-3">
         <li>
            <a href="{{ route('admin.home') }}" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-50 hover:text-gray-900 dark:hover:bg-gray-700 group">
                <svg class="w-6 h-6 text-gray-100 dark:text-white group-hover:text-gray-900 hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                  </svg>
                  
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.stok-baru') }}" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-50 hover:text-gray-900 dark:hover:bg-gray-700 group">
                <svg class="w-6 h-6 text-gray-100 dark:text-white group-hover:text-gray-900 hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z"/>
                    <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z"/>
                  </svg>
                  
               <span class="flex-1 ms-3 whitespace-nowrap">Stok Masuk</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.pesanan') }}" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-50 hover:text-gray-900 dark:hover:bg-gray-700 group">
                <svg class="w-6 h-6 text-gray-100 dark:text-white group-hover:text-gray-900 hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4"/>
                  </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Pesanan</span>
            </a>
         </li>
         <li>
            <a href="{{ route('admin.master') }}" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-50 hover:text-gray-900 dark:hover:bg-gray-700 group">
                <svg class="w-6 h-6 text-gray-100 dark:text-white group-hover:text-gray-900 hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 1 0 0 4h16a2 2 0 1 0 0-4H4Zm0 6h16v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8Zm10.707 5.707a1 1 0 0 0-1.414-1.414l-.293.293V12a1 1 0 1 0-2 0v2.586l-.293-.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l2-2Z" clip-rule="evenodd"/>
                  </svg>
                  
               <span class="flex-1 ms-3 whitespace-nowrap">Stok Master</span>
            </a>
         </li>
        
         <li>
            <a href="{{ route('logout') }}" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-50 hover:text-gray-900 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-100 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
            </a>
         </li>
      </ul>
   </div>
</aside>