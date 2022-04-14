<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width">
      <title>Blade Components and Slots</title>
      <meta name="description" content="">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   </head>
   <body>
   <div class="container">
      @component('alert')
          @slot('class')
              alert-danger
           @endslot

           @slot('title')
            Error
            @endslot
           
           Error Component
         @endcomponent



         
         @component('alert')
           @slot('class')
             alert-success
            @endslot

            @slot('title')
              Success
            @endslot
            Success Component
          @endcomponent
      </div>
   </body>
</html>