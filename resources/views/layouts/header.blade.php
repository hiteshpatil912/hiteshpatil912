
<header class="w-full bg-gray-700 p-4 flex justify-between items-center">
  <nav class="flex items-center">
    <img class="w-7 h-7" src="https://www.solarwinds.com/-/media/solarwinds/swdcv2/licensed-products/service-desk/integrations/sd-integrations-logo-jira.ashx?rev=701fbaa7f8ac4ae08e0406c8984c43e7&hash=75D4F04DE99B88DE7B2C4193F0616F1F" />
  </nav>
  <div class="flex flex-col justify-center ">
<div class="flex items-center justify-center">
  <div class=" relative inline-block text-left dropdown">
    <span class="rounded-md shadow-sm"
      >
      <button class="inline-flex justify-center w-full px-2 py-2 text-sm font-medium leading-5  transition duration-150 ease-in-out  rounded-md focus:outline-none  focus:shadow-outline-blue active:text-gray-800" 
       type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
    <img class="rounded-lg h-8 w-10" src="{{asset(auth()->user()->image)}}" />
    </button
    ></span>
    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
      <div class="absolute right-0 w-40 mt-2 origin-top-right bg-gray-300 z-10 border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
        <div class="">
          <a href="{{ route('home') }}" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >{{ auth()->user()->name
             }}</a>
          <a href="{{ route('logout') }}" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left"  role="menuitem" >Sign out</a>
        </div>
      </div>
    </div>
  </div>
</div>              
</div>
  <style>
.dropdown:focus-within .dropdown-menu {
  opacity:1;
  transform: translate(0) scale(1);
  visibility: visible;
}
    </style>
</header>