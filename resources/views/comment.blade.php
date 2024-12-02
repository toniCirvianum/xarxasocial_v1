<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body x-data="{ openModal: false }">

<button @click="$dispatch('open-modal', 'hola')">
    obre modal
</button>
<x-modal name='hola'>
   <p>Estic a detall de la imatge amb id {{ $id }}</p>
</x-modal>
    
</body>
</html>


