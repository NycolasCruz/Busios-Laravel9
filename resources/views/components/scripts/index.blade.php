@section('js')
<script>
    // get all stores
    async function showStores() {
        const loader = document.querySelector('#loader-allData');
        const tbody = document.querySelector('#tbody');

        loader.removeAttribute('hidden');
        tbody.setAttribute('hidden', true);

        const response = await axios.get('{{ route('dashboard.getAllData') }}');

        loader.setAttribute('hidden', true);
        tbody.innerHTML = ''

        response.data.map((data, i) => {
            const showActionsToOwner = {{ Auth::user()->id }} != data.user.id && "d-none"
            const showActionsToUser = {{ Auth::user()->id }} == data.user.id && "d-none"

            tbody.innerHTML += `
                <tr class="align-middle">
                    <td>${i + 1}</td>
                    <td>${data.shop_name}</td>
                    <td>${data.user.name}</td>
                    <td>${data.branch}</td>
                    <td class="text-end">
                        <button
                            class="btn btn-icon bg-primary text-white show-button"
                            title="Ver Detalhes"
                            data-bs-toggle="modal"
                            data-bs-target="#show-modal"
                            data-id="${data.id}"
                        >
                            <i class="fas fa-eye"></i>
                        </button>
                        <button
                            class="btn btn-icon bg-dark text-white ms-2 ${showActionsToUser}"
                            title="Enviar Currículo"
                            data-bs-toggle="modal"
                            data-bs-target="#curriculum-modal"
                            data-id="${data.id}"
                        >
                            <i class="far fa-file-lines"></i>
                        </button>
                        <button
                            class="btn btn-icon bg-green text-white ms-2 ${showActionsToOwner}"
                            title="Visualizar Currículos"
                            data-id="${data.id}"
                        >
                            <i class="fas fa-user"></i>
                        </button>
                        <button
                            class="btn btn-icon bg-warning text-white ms-2 edit-button ${showActionsToOwner}"
                            title="Editar Informações"
                            data-bs-toggle="modal"
                            data-bs-target="#edit-modal"
                            data-id="${data.id}"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <button
                            class="btn btn-icon bg-danger text-white ms-2 ${showActionsToOwner}"
                            title="Excluir Informações"
                            data-id="${data.id}"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `
        });

        tbody.removeAttribute('hidden');    
        getSpecificStore();
        getDataToEditStore();
    }

    window.onload = showStores;

    // register form
    document.querySelector('#register-form').addEventListener('submit', async (event) => {
        event.preventDefault();
        const inputData = Array.from(event.target.querySelectorAll('div.row div input[type="text"]'));
        const incomeValue = document.querySelector('#income').value;

        const checkboxes = Array.from(event.target.querySelectorAll('input.check-extras'));
        const checkboxesChecked = checkboxes.filter((checkbox) => checkbox.checked);
        const checkboxesValues = checkboxesChecked.map(checkbox => checkbox.value);

        Toast.fire({
            icon: 'info',
            title: 'Aguarde um pouco..'
        })

        $('#register-modal').modal('hide');

        try {
            const response = await axios.post('{{ route('dashboard.store') }}', {
                shop_name: inputData[0].value,
                branch: inputData[1].value,
                description: inputData[2].value,
                number: inputData[3].value,
                cpf: inputData[4].value,
                address: inputData[5].value,
                income: incomeValue,
                characteristics: checkboxesValues
            });

            Toast.fire({
                icon: 'success',
                title: 'Loja cadastrada com sucesso!'
            })

            inputData.forEach(input => input.value = '');
            document.querySelector('#tbody').innerHTML = '';
            showStores();
        } catch (error) {
            console.error(error);

            Toast.fire({
                icon: 'error',
                title: 'Erro ao cadastrar a loja'
            })
        }
    });

    let id = 0;

    // get specific store (show)
    function getSpecificStore() {
        document.querySelectorAll('.show-button').forEach(button => {
            button.addEventListener('click', async (event) => {
                const loader = document.querySelector('#loader-show');
                const button = event.relatedTarget;
                id = event.currentTarget.dataset.id;
                
                loader.removeAttribute('hidden');
                document.querySelector('#show-modal-body').innerHTML = '';

                const response = await axios.get('{{ route('dashboard.show', ':id') }}'.replace(':id', id));

                const data = response.data

                let income = ''

                switch(data.income) {
                    case 1:
                        income = 'Menos de R$ 10.000,00'
                        break;
                    case 2:
                        income = 'Entre R$ 10.000,00 e R$ 50.000,00'
                        break;
                    case 3:
                        income = 'Mais que R$ 50.000,00'
                        break;
                }

                loader.setAttribute('hidden', true);

                document.querySelector('#show-modal-body').innerHTML = `
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Proprietário:
                        <span class="fw-normal">
                            ${data.user.name}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Email do proprietário:
                        <span class="fw-normal">
                            ${data.user.email}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Nome da loja:
                        <span class="fw-normal">
                            ${data.shop_name}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Ramo:
                        <span class="fw-normal">
                            ${data.branch}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Descrição:
                        <span class="fw-normal">
                            ${data.description}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Telefone:
                        <span class="fw-normal">
                            ${data.number}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Cpf:
                        <span class="fw-normal">
                            ${data.cpf}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Logradouro:
                        <span class="fw-normal">
                            ${data.address}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Renda mensal:
                        <span class="fw-normal">
                            ${income}
                        </span>
                    </p>
                    <p class="text-gray-700 fw-bold fs-6 mb-3">
                        Extras
                    </p>
                    <span class="d-flex align-items-center fw-normal ms-4">
                        <i class="fa-solid fa-caret-right me-2"></i>
                        ${data.characteristics}
                    </span>
                `;
            })
        })
    }

    // get specific store (edit)
    function getDataToEditStore() {
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', async (event) => {
                const loader = document.querySelector('#loader-edit');
                const button = event.relatedTarget;
                const editForm = document.querySelector('#edit-form')
                id = event.currentTarget.dataset.id;

                const inputData = Array.from(editForm.querySelectorAll('div.row div input[type="text"]'));
                inputData.forEach(input => input.value = '');

                loader.removeAttribute('hidden');
                editForm.setAttribute('hidden', true);

                const response = await axios.get('{{ route('dashboard.show', ':id') }}'.replace(':id', id));

                loader.setAttribute('hidden', true);
                editForm.removeAttribute('hidden');

                inputData[0].value = response.data.shop_name;
                inputData[1].value = response.data.branch;
                inputData[2].value = response.data.description;
                inputData[3].value = response.data.number;
                inputData[4].value = response.data.cpf;
                inputData[5].value = response.data.address;
                // income
                // extras
            })
        })
    }

    // edit store
    document.querySelector('#edit-form').addEventListener('submit', async (event) => {
        event.preventDefault();

        const inputData = Array.from(event.target.querySelectorAll('div.row div input[type="text"]'));
        const incomeValue = document.querySelector('#edit-income').value;

        const checkboxes = Array.from(event.target.querySelectorAll('input.edit-check-extras'));
        const checkboxesChecked = checkboxes.filter((checkbox) => checkbox.checked);
        const checkboxesValues = checkboxesChecked.map(checkbox => checkbox.value);

        Toast.fire({
            icon: 'info',
            title: 'Aguarde um pouco..'
        })

        $('#edit-modal').modal('hide');

        try {
            const response = await axios.put('{{ route('dashboard.update', ':id') }}'.replace(':id', id), {
                shop_name: inputData[0].value,
                branch: inputData[1].value,
                description: inputData[2].value,
                number: inputData[3].value,
                cpf: inputData[4].value,
                address: inputData[5].value,
                income: incomeValue,
                characteristics: checkboxesValues
            })

            Toast.fire({
                icon: 'success',
                title: 'Loja editada com sucesso!'
            })

            showStores();
        } catch (error) {
            console.error(error);

            Toast.fire({
                icon: 'error',
                title: 'Erro ao editar loja!'
            })
        }
    })
</script>
@endsection
