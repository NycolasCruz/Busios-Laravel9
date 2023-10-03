@section("js")
<script>
	const numberMask = IMask(document.querySelector(".numberMask"), { mask: "(00) 90000-0000" });
	const cpfMask = IMask(document.querySelector(".cpfMask"), { mask: "000.000.000-00" });
	let isPostForm = true;
	let id;

	document.querySelector("#register-button").addEventListener("click", () => {
		document.querySelector(".modal-title").innerHTML = "Cadastrar loja";
		isPostForm = true;
	});

	async function handleShowAllShops(search) {
		const loader = document.querySelector("#loader-allData");
		const tbody = document.querySelector("#tbody");

		loader.removeAttribute("hidden");
		tbody.setAttribute("hidden", true);
		tbody.innerHTML = "";

		try {
			const { data: allData } = await axios.get("{{ route('dashboard.getAllData') }}", {
				params: { search: search?.length && search },
			});

			loader.setAttribute("hidden", true);

			allData.map((data, index) => {
				const showActionsToOwner = {{ Auth::user()->id }} !== data.user.id && "d-none";
				const showActionsToUser = {{ Auth::user()->id }} === data.user.id && "d-none";

				tbody.innerHTML += `
						<tr class="align-middle">
							<td>${index + 1}</td>
							<td>${data.shop_name}</td>
							<td>${data.user.name}</td>
							<td>${data.branch}</td>
							<td class="text-end py-0">
								<button
									class="btn btn-icon bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 border-sky-500 focus:border-sky-600 focus:ring-2 text-white scale-[.8] show-button"
									title="Ver detalhes"
									data-bs-toggle="modal"
									data-bs-target="#show-modal"
									data-id="${data.id}"
								>
									<i class="fas fa-eye"></i>
								</button>
								<button
									class="btn btn-icon bg-amber-400 hover:bg-yellow-500 focus:bg-yellow-500 border-amber-400 focus:border-yellow-500 focus:ring-2 focus:ring-amber-300 text-white scale-[.8] edit-button ${showActionsToOwner}"
									title="Editar loja"
									data-bs-toggle="modal"
									data-bs-target="#register-modal"
									data-id="${data.id}"
								>
									<i class="fas fa-edit"></i>
								</button>
								<button
									class="btn btn-icon bg-red-600 hover:bg-red-500 focus:bg-red-500 border-red-600 focus:border-red-500 focus:ring-2 focus:ring-red-300 text-white scale-[.8] delete-button ${showActionsToOwner}"
									title="Apagar loja"
									data-id="${data.id}"
								>
									<i class="fas fa-trash"></i>
								</button>
							</td>
						</tr>
					`;

				tbody.removeAttribute("hidden");
				handleShowSpecificShop();
				fillOutTheForm();
				deleteShop();
			});
		} catch (error) {
			console.error(error);
			errorToast("Erro ao carregar as lojas!");
		}
	}

	window.onload = handleShowAllShops;

	// register / edit form
	document.querySelector("#register-form").addEventListener("submit", async (event) => {
		event.preventDefault();

		const formData = new FormData(event.target);
		const checkboxes = document.querySelectorAll(".form-check-input:checked");
		let errorMessage = "Erro ao cadastrar a loja!";
		let characteristics = [];

		checkboxes.forEach((checkbox) => {
			characteristics.push(checkbox.value);
		});

		try {
			if (isPostForm) {
				await axios.post("{{ route('dashboard.store') }}", formData);

				successToast("Loja cadastrada com sucesso!");
			} else {
				errorMessage = "Erro ao editar a loja!";
				await axios.put("{{ route('dashboard.update', ':id') }}".replace(":id", id), {
					...Object.fromEntries(formData),
					characteristics,
				});

				successToast("Loja editada com sucesso!");
			}

			bootstrap.Modal.getInstance("#register-modal").hide();
			handleShowAllShops();
			isPostForm = false;
		} catch (error) {
			console.error(error);
			errorToast(Object.values(error.response.data.errors)[0][0]);
		}
	});

	function fillOutTheForm() {
		document.querySelectorAll(".edit-button").forEach((button) => {
			button.addEventListener("click", async (event) => {
				document.querySelector(".modal-title").innerHTML = "Editar loja";

				const form = document.querySelector("#register-form");
				id = event.currentTarget.dataset.id;
				isPostForm = false;

				const inputData = Array.from(form.querySelectorAll("div.row div input[type='text']"));

				form.setAttribute("hidden", true);

				try {
					const { data } = await axios.get(
						"{{ route('dashboard.show', ':id') }}".replace(":id", id),
					);

					form.removeAttribute("hidden");

					inputData[0].value = data.shop_name;
					inputData[1].value = data.branch;
					inputData[2].value = data.description;
					inputData[3].value = data.number;
					inputData[4].value = data.cpf;
					inputData[5].value = data.address;
					document.querySelector("#employees").value = data.employees;
					data.characteristics.forEach((characteristic) => {
						document.querySelector(`#check-${characteristic}`).checked = true;
					});

				} catch (error) {
					console.error(error);
					errorToast("Erro ao carregar as informações da loja!");
				}
			});
		});
	}

	function deleteShop() {
		document.querySelectorAll(".delete-button").forEach((button) => {
			button.addEventListener("click", async (event) => {
				id = event.currentTarget.dataset.id;

				try {
					const { isConfirmed } = await Swal.fire({
						title: "Você deseja apagar a loja?",
						text: "Esta ação não poderá ser desfeita?",
						icon: "warning",
						confirmButtonText: "Sim",
						showCancelButton: true,
						cancelButtonText: "Cancelar",
					});

					if (isConfirmed) {
						await axios.delete(
							"{{ route('dashboard.destroy', ':id') }}".replace(":id", id),
						);

						handleShowAllShops();
						successToast("Loja apagada com sucesso!");
					}
				} catch (error) {
					console.error(error);
					errorToast("Erro ao excluir a loja!");
				}
			});
		});
	}

	function handleShowSpecificShop() {
		document.querySelectorAll(".show-button").forEach((button) => {
			button.addEventListener("click", async (event) => {
				const loader = document.querySelector("#loader-show");
				const button = event.relatedTarget;
				const showModalBody = document.querySelector("#show-modal-body");
				id = event.currentTarget.dataset.id;

				loader.removeAttribute("hidden");
				showModalBody.innerHTML = "";

				try {
					const { data } = await axios.get(
						"{{ route('dashboard.show', ':id') }}".replace(":id", id),
					);

					let numberOfEmployees;

					switch (data.employees) {
						case 1:
							numberOfEmployees = "Menos de 10 funcionários";
							break;
						case 2:
							numberOfEmployees = "Entre 10 e 100 funcionários";
							break;
						case 3:
							numberOfEmployees = "Mais que 100 funcionários";
							break;
					}

					loader.setAttribute("hidden", true);
					showModalBody.innerHTML = `
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
								${data.description || "Sem descrição"}
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
							Quantidade de funcionários:
							<span class="fw-normal">
								${numberOfEmployees}
							</span>
						</p>
						${data.characteristics ? `
							<p class="text-gray-700 font-bold fs-6 mb-3">
								Extras:
							</p>
						` : ""}
						${data.characteristics
							? data.characteristics
								.map((characteristic) => {
									let translatedCharacteristic;

									switch (characteristic) {
										case "1":
											translatedCharacteristic = "Possui site próprio";
											break;
										case "2":
											translatedCharacteristic = "Possui filiais";
											break;
										case "3":
											translatedCharacteristic =
												"Possui loja física e virtual";
											break;
										case "4":
											translatedCharacteristic =
												"Faz entregas à domicílio";
											break;
									}

									return `
										<div class="flex items-center fw-normal ms-4">
											<i class="fa-solid fa-caret-right me-2"></i>
											${translatedCharacteristic}
										</div>
									`;
								})
								.join("")
							: ""
						}
					`;
				} catch (error) {
					console.error(error);
					errorToast("Erro ao carregar as informações da loja!");
				}
			});
		});
	}

	// search
	document.querySelector("#search-input").addEventListener("input", (event) => {
		handleShowAllShops(event.target.value);
	});

	// clear all data whenever register modal closes
	document.querySelector("#register-modal").addEventListener("hidden.bs.modal", (event) => {
		event.target.querySelector("form").reset();
	});

	function successToast(title) {
		Toast.fire({
			icon: "success",
			title: title,
		});
	}

	function errorToast(title) {
		Toast.fire({
			icon: "error",
			title: title,
		});
	}
</script>
@endsection
