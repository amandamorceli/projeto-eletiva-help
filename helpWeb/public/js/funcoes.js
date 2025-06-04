document.addEventListener('DOMContentLoaded', function () {
    const cepInput = document.getElementById('cep');

    if (!cepInput) {
        console.warn('Campo #cep não encontrado.');
        return;
    }

    // ✅ Aplica a máscara de CEP: 99999-999
    if (window.Inputmask) {
        Inputmask("99999-999").mask(cepInput);
    } else {
        console.error('Inputmask não carregado.');
    }

    // ✅ Busca endereço ao sair do campo
    cepInput.addEventListener('blur', async function () {
        const cep = this.value.replace(/\D/g, '');

        if (cep.length !== 8) {
            alert("CEP inválido. Deve conter 8 dígitos.");
            return;
        }

        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (data.erro) {
                alert("CEP não encontrado.");
                return;
            }

            document.getElementById('endereco').value = data.logradouro || '';
            document.getElementById('bairo').value = data.bairro || '';
            document.getElementById('cidade').value = data.localidade || '';
            document.getElementById('estado').value = data.uf || '';

        } catch (error) {
            console.error("Erro ao buscar o endereço:", error);
            alert("Erro ao buscar o endereço.");
        }
    });
});
