<div>
@if (session()->has('verificated'))
<script type="module">
    window.$wireui.notify({
    title: 'Conta Ativada!',
    description: 'Seja bem vindo! Sua conta foi ativada com sucesso ;)',
    icon: 'success'
})
</script>
@endif
</div>
