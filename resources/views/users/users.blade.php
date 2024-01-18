<x-app-layout>
    @livewireStyles
  
    <style>
        .loader {
          border-top-color: #3088D9;
          -webkit-animation: spinner 1.5s linear infinite;
          animation: spinner 1.5s linear infinite;
        }
  
        @-webkit-keyframes spinner {
          0% {
            -webkit-transform: rotate(0deg);
          }
  
          100% {
            -webkit-transform: rotate(360deg);
          }
        }
  
        @keyframes spinner {
          0% {
            transform: rotate(0deg);
          }
  
          100% {
            transform: rotate(360deg);
          }
        }

        .transitionh{
            animation: opacity 0.5s linear;
        }
    </style>
  
    <livewire:users.users/>
    
    @stack('js') 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</x-app-layout>
  
  