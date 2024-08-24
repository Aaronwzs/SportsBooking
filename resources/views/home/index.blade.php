<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
    <head>
    @include('home.css')
      
</head>
  <body data-home-page="Page-1.html" data-home-page-title="Page 1" data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en">

       

        

        @include('home.header')

        @include('home.mainscreen')
    
        @include ('home.product')

        @include ('home.promotion')

        @include ('home.addition_details')
  
        @include ('home.footer')
  
</body></html>