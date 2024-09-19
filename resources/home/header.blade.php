<header class="u-clearfix u-header u-header" id="sec-9cc3">
<div class="u-clearfix u-sheet u-valign-middle u-sheet-1">

<!-- logo -->
        <a href="#" class="u-image u-logo u-image-1">
          <img src="images/default-logo.png" class="u-logo-image u-logo-image-1">
        </a>
<!-- logo -->
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1">
     <li class="u-nav-item">
        <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" 
        href="About.html" style="padding: 10px 20px;">About</a>
</li>
<li class="u-nav-item">
    <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" 
    href="Contact.html" style="padding: 10px 20px;">Contact</a>
</li>
<li class="u-nav-item">
           
@if (Route::has('login'))
                
                    @auth
                   <x-app-layout></x-app-layout></li>
                    @else
                  <li class="u-nav-item"><a href="{{ route('login') }}" 
                  class="text-sm text-gray-700 dark:text-gray-500 underline" 
                  style="padding: 10px 5px 10px 100px;">Login</a>
</li>
                        @if (Route::has('register'))
                       <li class="u-nav-item"><a href="{{ route('register') }}" 
                       class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" 
                       style="padding: 10px 5px 10px 5px;">Register</a>
</li>                     
                        @endif
                    @endauth
                
            @endif
            </ul>
          </div>
          

        </nav>
      </div>
      </header>