<x-app-layout>
    @livewireStyles
  
    <livewire:areasprocess.areasprocess/>
    
    @stack('js') 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 

  
</x-app-layout>
  
  