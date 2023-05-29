@section("js")
<script>
    const numberMask = IMask(document.querySelector("#numberMask"), {mask: "(00) 90000-0000"});
    const cpfMask = IMask(document.querySelector("#cpfMask"), {mask: "000.000.000-00"});

    async function handleShowAllShops() {
        const loader = document.querySelector("#loader-allData");
        const tbody = document.querySelector("#tbody");

        loader.removeAttribute("hidden");
        tbody.setAttribute("hidden", true);

        const { data: allData } = await axios.get("{{ route('dashboard.getAllData') }}");

        loader.setAttribute("hidden", true);
        tbody.innerHTML = ""

        allData.map((data, index) => {
            const showActionsToOwner = {{ Auth::user()->id }} != data.user.id && "d-none"
            const showActionsToUser = {{ Auth::user()->id }} == data.user.id && "d-none"

            tbody.innerHTML += `
                <tr class="align-middle">
                    <td>${index + 1}</td>
                    <td>${data.shop_name}</td>
                    <td>${data.user.name}</td>
                    <td>${data.branch}</td>
                    <td class="text-end">
                        <button
                            class="btn btn-icon bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 border-sky-500 focus:border-sky-600 focus:ring-2 text-white show-button"
                            title="Ver Detalhes"
                            data-bs-toggle="modal"
                            data-bs-target="#show-modal"
                            data-id="${data.id}"
                        >
                            <i class="fas fa-eye"></i>
                        </button>
                        <button
                            class="btn btn-icon bg-amber-400 hover:bg-yellow-500 focus:bg-yellow-500 border-amber-400 focus:border-yellow-500 focus:ring-2 focus:ring-amber-300 text-white ms-2 md:mt-0 sm:mt-1 edit-button ${showActionsToOwner}"
                            title="Editar Informações"
                            data-bs-toggle="modal"
                            data-bs-target="#edit-modal"
                            data-id="${data.id}"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                        <button
                            class="btn btn-icon bg-red-600 hover:bg-red-500 focus:bg-red-500 border-red-600 focus:border-red-500 focus:ring-2 focus:ring-red-300 text-white ms-2 lg:mt-0 md:mt-1 sm:mt-1 ${showActionsToOwner}"
                            title="Excluir Informações"
                            data-id="${data.id}"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `
        });

        tbody.removeAttribute("hidden");    
        handleShowSpecificShop();
        fillOutForm();
        handleSendCurriculum();
    }
    
    window.onload = handleShowAllShops;

    // register form
    document.querySelector("#register-form").addEventListener("submit", async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);

        try {
            await axios.post("{{ route('dashboard.store') }}", formData );

            successToast("Loja cadastrada com sucesso!");
            bootstrap.Modal.getInstance("#register-modal").hide();
            document.querySelector("#tbody").innerHTML = "";
            handleShowAllShops();
        } catch (error) {
            console.error(error);
            errorToast("Erro ao cadastrar a loja!");
        }
    });

    let id = 0;

    // popular o formulário
    function fillOutForm() {
        document.querySelectorAll(".edit-button").forEach(button => {
            button.addEventListener("click", async (event) => {
                const loader = document.querySelector("#loader-edit");
                const editForm = document.querySelector("#edit-form")
                id = event.currentTarget.dataset.id;

                const inputData = Array.from(editForm.querySelectorAll("div.row div input[type='text']"));

                loader.removeAttribute("hidden");
                editForm.setAttribute("hidden", true);

                const { data } = await axios.get("{{ route('dashboard.show', ':id') }}".replace(":id", id));

                loader.setAttribute("hidden", true);
                editForm.removeAttribute("hidden");

                inputData[0].value = data.shop_name;
                inputData[1].value = data.branch;
                inputData[2].value = data.description;
                inputData[3].value = data.number;
                inputData[4].value = data.cpf;
                inputData[5].value = data.address;
                // employees
                // extras
            })
        })
    }

    // edit shop
    document.querySelector("#edit-form").addEventListener("submit", async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);

        try {
            await axios.post("{{ route('dashboard.update', ':id') }}".replace(":id", id), formData)

            successToast("Loja editada com sucesso!");
            bootstrap.Modal.getInstance("#edit-modal").hide();
            handleShowAllShops();
        } catch (error) {
            console.error(error);
            errorToast("Erro ao editar a loja!");
        }
    })

    function handleShowSpecificShop() {
        document.querySelectorAll(".show-button").forEach(button => {
            button.addEventListener("click", async (event) => {
                const loader = document.querySelector("#loader-show");
                const button = event.relatedTarget;
                id = event.currentTarget.dataset.id;
                
                loader.removeAttribute("hidden");
                document.querySelector("#show-modal-body").innerHTML = "";

                const { data } = await axios.get("{{ route('dashboard.show', ':id') }}".replace(":id", id));

                let employees = ""

                switch(data.employees) {
                    case 1:
                        employees = "Menos de 10 funcionários"
                        break;
                    case 2:
                        employees = "Entre 10 e 100 funcionários"
                        break;
                    case 3:
                        employees = "Mais que 100 funcionários"
                        break;
                }

                loader.setAttribute("hidden", true);

                document.querySelector("#show-modal-body").innerHTML = `
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Proprietário:
                        <span class="fw-normal">
                            ${data.user.name}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Email do proprietário:
                        <span class="fw-normal">
                            ${data.user.email}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Nome da loja:
                        <span class="fw-normal">
                            ${data.shop_name}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Ramo:
                        <span class="fw-normal">
                            ${data.branch}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Descrição:
                        <span class="fw-normal">
                            ${data.description}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Telefone:
                        <span class="fw-normal">
                            ${data.number}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Cpf:
                        <span class="fw-normal">
                            ${data.cpf}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Logradouro:
                        <span class="fw-normal">
                            ${data.address}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Renda mensal:
                        <span class="fw-normal">
                            ${employees}
                        </span>
                    </p>
                    <p class="text-gray-700 font-bold fs-6 mb-3">
                        Extras
                    </p>
                    <span class="flex items-center fw-normal ms-4">
                        <i class="fa-solid fa-caret-right me-2"></i>
                        ${data.characteristics}
                    </span>
                `;
            })
        })
    }

    // clear all data whenever register modal closes
    document.querySelector("#register-modal").addEventListener("hidden.bs.modal", event => {
        event.target.querySelector("form").reset();
    })

    function successToast(title) {
        Toast.fire({
            icon: "success",
            title: title
        })
    }

    function errorToast(title) {
        Toast.fire({
            icon: "error",
            title: title
        })
    }
</script>
@endsection
