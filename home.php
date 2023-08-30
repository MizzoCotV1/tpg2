<!DOCTYPE html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Login / Sign Up Form</title>
	<link rel="shortcut icon" href="/assets/favicon.ico">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="test1.css">
	<script src="Tabs.js"></script>
	<link rel="stylesheet" href="background.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
</head>

<body class="bg-gray-200">
	
	<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
		<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
		<a href="#aboutaboutus" class="flex items-center">
			<img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo">
			<span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-700 dark:text-white">TPG2</span>
		</a>
		<div class="flex md:order-2">
			<a href="admin/login.php" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
			<button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
			<span class="sr-only">Open main menu</span>
			<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
			</svg>
		</button>
		</div>
		<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
		<ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
			<li>
				<a href="#homehome" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-70 active:text-blue-700 ">Home</a>
				</li>
			<li>
				<a href="#aboutaboutus" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active:text-blue-700">About</a>
				</li>
			<li>
			<a href="#informationtion" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active:text-blue-700">Information</a>
			</li>
			<li>
			<a href="#contactcontact" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 active:text-blue-700">Contact</a>
			</li>
		</ul>
		</div>
		</div>
	</nav>
	<section class="section main-banner mt-12" id="top" data-section="section1" id="homehome">
		<video autoplay muted loop id="bg-video">
			<source src="./img/youtube2.mp4" type="video/mp4" />
		</video>
  
		<div class="video-overlay header-text">
			<div class="pb-8">
				<div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
					<div class="relative pt-36 ml-auto">
						<div class="lg:w-2/3 text-center mx-auto">
							<h1 class=" text-white font-bold text-5xl md:text-6xl xl:text-7xl">SMK TERATAI
								PUTIH <span class="text-blue-600">GlOBAL 2 BEKASI</span></h1>
							<p class="mt-8 text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing
								elit. Odio incidunt nam itaque sed eius modi error totam sit illum. Voluptas doloribus asperiores
								quaerat aperiam. Quidem harum omnis beatae ipsum soluta!</p>
							<div class="mt-16 flex flex-wrap justify-center gap-y-4 gap-x-6">
								<a href="#"
									class="relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:border before:border-transparent before:bg-primary/10 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 before:border-gray-700 before:bg-gray-800 sm:w-max">
									<span class="relative text-base font-semibold text-primary text-white">About Us</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section why-us" data-section="section1">
		<div class="container max-w-5xl mx-auto pt-32" id="aboutaboutus">
			<div data-aos="fade-up" data-aos-duration="1500" >
				<h2 class="w-full text-5xl font-bold leading-tight text-center text-white">
					About Us
				</h2>
			</div>
			<div class="w-full mb-4">
				<div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
			</div>
			<div class="flex flex-wrap">
				<div class="w-5/6 sm:w-1/2 p-6" data-aos="fade-up" data-aos-duration="1500" >
					<h3 class="text-3xl text-white font-bold leading-none mb-3">
						Sejarah
					</h3>
					<p class="text-gray-300 mb-8">
						Pada tahun 1997, dibuka kembali SMK (SMEA) Teratai Putih 2 dengan program keahlian Akuntansi, Sekretaris, dan Penjualan, dan pertambahan jurusan yaitu Rekayasa Perangkat Lunak, Multimedia, dan Pebankan, yang beralamat di Jl. Rajawali V No.29 Perumnas I Kota Bekasi.
					</p>
				</div>
				<div class="w-full sm:w-1/2 p-6">
				</div>
			</div>
			<div class="flex flex-wrap flex-col-reverse sm:flex-row">
				<div class="w-full sm:w-1/2 p-6 mt-6">
				</div>
				<div class="w-full sm:w-1/2 p-6 mt-6">
				<div class="align-middle" data-aos="fade-up" data-aos-duration="1500" >
					<h3 class="text-3xl text-white font-bold leading-none mb-3">
					Kurikulum
					</h3>
					<p class="text-gray-300 mb-8">
						Kurikulum yang diterapkan disini yaitu kurikulum merdeka dengan alokasi waktu selama 10 - 12 jam pelajaran yang berlangsung dari hari Senin-Jumat. Sebelum memulai jam pelajaran, biasanya siswa-siswi mengadakan tadarus Al-Quran yang dipimpin oleh Bapak/Ibu guru yang bertugas.
					</p>
				</div>
				</div>
			</div>
		</div>
	</section>
	<section data-section="section2">
		<div class="container max-w-5xl mx-auto py-32 lg:px-0 px-10" id="informationtion">
			<div data-aos="fade-up" data-aos-duration="1500" >
				<h2 class="w-full text-5xl font-bold leading-tight text-center text-gray-800 mb-20">
					Information
				</h2>
			</div>
			<div data-aos="fade-up" data-aos-duration="1500" class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
				<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
					<li class="mr-2">
						<button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block p-4 rounded-tl-lg hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jurusan</button>
					</li>
					<li class="mr-2">
						<button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Fasilitas</button>
					</li>
					<li class="mr-2">
						<button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Facts</button>
					</li>
					<li class="mr-2">
						<button id="hdn-tab" data-tabs-target="#hdn" type="button" role="tab" aria-controls="hdn" aria-selected="true" class="hidden p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Facts</button>
					</li>
				</ul>
				<div id="defaultTabContent">
					<div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" role="tabpanel" id="hdn" aria-labelledby="hdn-tab">
						<h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">SMK Teratai Putih Global 2 Bekasi</h2>
						<p class="mb-3 text-gray-500 dark:text-gray-400">Jurusan berupa rekayasa perangkat lunak, multimedia dan lainnya yang mempunyai masing-masing fasilitas lab</p>
						<a href="#" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
							Learn more
							<svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
							</svg>
						</a>
					</div>
					<div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
						<h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Jurusan SMK TPG 2</h2>
						<!-- List -->
						<ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Multimedia</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Rekayasa Perangkat Lunak</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Perbankan</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Bisnis Daring dan Pemasaran</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Otomitasi dan Tata Kelola Perkantoran</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Akuntansi</span>
							</li>
						</ul>
					</div>
					<div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
						<h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Fasilitas SMK TPG 2</h2>
						<!-- List -->
						<ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Laboratorium Jurusan</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Ruang UKS</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Wifi Connection</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Lapangan Utama</span>
							</li>
							<li class="flex space-x-2 items-center">
								<svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
								</svg>
								<span class="leading-tight">Halaman Parkir</span>
							</li>
						</ul>
					</div>
					<div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
						<dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
							<div class="flex flex-col">
								<dt class="mb-2 text-3xl font-extrabold">300+</dt>
								<dd class="text-gray-500 dark:text-gray-400">Siswa</dd>
							</div>
							<div class="flex flex-col">
								<dt class="mb-2 text-3xl font-extrabold">90+</dt>
								<dd class="text-gray-500 dark:text-gray-400">Guru & Karyawan</dd>
							</div>
							<div class="flex flex-col">
								<dt class="mb-2 text-3xl font-extrabold">20+</dt>
								<dd class="text-gray-500 dark:text-gray-400">Ruang Kelas</dd>
							</div>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section why-us" data-section="section3">
		<div class="container max-w-5xl mx-auto pt-20 lg:px-0 px-10 " id="contactcontact">
			<div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md" data-aos="fade-up" data-aos-duration="1500" >
				<h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-white">Contact Us</h2>
				<p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
				<form action="#" class="space-y-8">
					<div>
						<label for="email" class="block mb-2 text-sm font-medium text-gray-100">Your email</label>
						<input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
					</div>
					<div>
						<label for="subject" class="block mb-2 text-sm font-medium text-gray-100">Subject</label>
						<input type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
					</div>
					<div class="sm:col-span-2">
						<label for="message" class="block mb-2 text-sm font-medium text-gray-100">Your message</label>
						<textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
					</div>
					<button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Send message</button>
				</form>
			</div>
		</div>
	</section>
	<footer class="bg-gray-900">
		<div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
			<div class="md:flex md:justify-between">
				<div class="mb-6 md:mb-0">
					<a href="https://flowbite.com/" class="flex items-center">
						<img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" />
						<span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TPG2</span>
					</a>
				</div>
			</div>
			<hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
			<div class="sm:flex sm:items-center sm:justify-between">
				<span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">TPG2™</a>. All Rights Reserved.
				</span>
			</div>
		</div>
	</footer>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
	<script>
		AOS.init({once:true});
	</script>
</body>
