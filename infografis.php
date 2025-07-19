<?php include 'koneksi/konek1.php';
?>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />

<body class="bg-gradient-to-r from-[#4682B4] to-[#6A8D92] min-h-screen flex justify-center items-start p-4">
	<div class="bg-white max-w-5xl w-full rounded-lg shadow-lg border border-gray-300 p-6">
		<div class="text-center mb-6">
			<title>
				Demografi Penduduk
			</title>
			<script src="https://cdn.tailwindcss.com"> </script>
			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
			<link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet" />
			<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
			<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
			<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
			<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet" />
			<style>
				@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');


				body {
					font-family: "Poppins", sans-serif;
				}

				/* Scrollbar for table container */
				.scrollbar-thin::-webkit-scrollbar {
					height: 6px;
				}

				.scrollbar-thin::-webkit-scrollbar-thumb {
					background-color: #f87171;
					/* Tailwind red-400 */
					border-radius: 10px;
				}

				.scrollbar-thin::-webkit-scrollbar-track {
					background: transparent;
				}
			</style>
			</style>
			</head>

			<body class="bg-[#f7f9f8] p-6 sm:p-10">
				<div class="max-w-7xl mx-auto">
					<div class="flex flex-col lg:flex-row items-center lg:items-start gap-8">
						<div class="lg:w-full text-center mx-auto">

							<br><br>
							<h1 class="text-3xl sm:text-4xl font-extrabold text-[#e63946] leading-tight">
								DEMOGRAFI
								<br />
								PENDUDUK
							</h1>
							<p class="mt-4 text-base sm:text-lg text-[#1a1a1a]leading-relaxed">
								Demografi penduduk adalah studi atau gambaran statistik
								mengenai jumlah, distribusi, komposisi, dan perubahan penduduk
								dalam suatu wilayah atau negara.
							</p>
							<br><br>
							<div style="border-bottom: 2px solid #f87171; width: 100%; margin-top: 5px;"></div>
						</div>

					</div>
					<h2 class="mt-12 text-2xl sm:text-3xl font-extrabold text-[#e63946]">
						Jumlah Penduduk dan Kepala Keluarga
					</h2>
					<div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
						<div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
							<img alt="Illustration of three people group avatar with two women and one man" class="w-16 h-16 rounded-full flex-shrink-0" height="64" src="https://storage.googleapis.com/a1aa/image/1ddffe96-dba9-4cc1-c6a3-28ade75214bc.jpg" width="64" />
							<div>
								<p class="text-sm text-gray-600 font-semibold">
									TOTAL PENDUDUK
								</p>
								<p class="text-xl font-semibold text-gray-800">
									<span class="text-[#e63946]">
										4.720
									</span>
									Jiwa
								</p>
							</div>
						</div>
						<div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
							<img alt="Illustration of a man holding a child" class="w-16 h-16 rounded-full flex-shrink-0" height="64" src="https://storage.googleapis.com/a1aa/image/dff8b058-6386-4dc1-f121-e7435bdbc54c.jpg" width="64" />
							<div>
								<p class="text-sm text-gray-600 font-semibold">
									KEPALA KELUARGA
								</p>
								<p class="text-xl font-semibold text-gray-800">
									<span class="text-[#e63946]">
										1.492
									</span>
									Jiwa
								</p>
							</div>
						</div>
						<div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
							<img alt="Illustration of a woman wearing a hijab and glasses" class="w-16 h-16 rounded-full flex-shrink-0" height="64" src="https://storage.googleapis.com/a1aa/image/ad1da3e1-47ce-466c-1dc2-c6b68fefc30c.jpg" width="64" />
							<div>
								<p class="text-sm text-gray-600 font-semibold">
									PEREMPUAN
								</p>
								<p class="text-xl font-semibold text-gray-800">
									<span class="text-[#e63946]">
										2.228
									</span>
									Jiwa
								</p>
							</div>
						</div>
						<div class="bg-red rounded-lg shadow p-6 flex items-center gap-4">
							<img alt="Illustration of a young man with short hair wearing a blue jacket" class="w-16 h-16 rounded-full flex-shrink-0" height="64" src="https://storage.googleapis.com/a1aa/image/243d4981-0ac6-4cab-5711-43138c8fd881.jpg" width="64" />
							<div>
								<p class="text-sm text-gray-600 font-semibold">
									LAKI-LAKI
								</p>
								<p class="text-xl font-semibold text-gray-800">
									<span class="text-[#e63946]">
										2492
									</span>
									Jiwa
								</p>
							</div>
						</div>
					</div>
				</div>
				<br><br>
				<div style="border-bottom: 2px solid #f87171; width: 100%; margin-top: 5px;"></div>
			</body>

			<br><br>
			<h2 class="mt-12 text-2xl sm:text-3xl font-extrabold text-[#e63946]">
				Jumlah Dusun
			</h2>
			<br><br><br>

			<body class="bg-white p-6">
				<div class="max-w-md mx-auto">
					<canvas id="pieChart" class="w-full max-w-sm mx-auto"></canvas>
				</div>

				<script>
					const ctx = document.getElementById('pieChart').getContext('2d');
					const data = {
						labels: [
							'BOGOREJO 1',
							'BOGOREJO 2',
							'BOGOREJO 3',
							'BOGOREJO 4',
							'BOGOREJO 5',
							'BOGOREJO 6',
							'BOGOREJO 7',
							'BOGOREJO 8'
						],
						datasets: [{
							label: 'Jiwa',
							data: [829, 802, 553, 545, 688, 444, 647, 212],
							backgroundColor: [
								'#4F46E5',
								'#6366F1',
								'#818CF8',
								'#A5B4FC',
								'#4338CA',
								'#3730A3',
								'#312E81',
								'#1E40AF'
							],
							borderWidth: 1,
							borderColor: '#fff',
						}]
					};

					const config = {
						type: 'pie',
						data: data,
						options: {
							responsive: true,
							plugins: {
								legend: {
									position: 'bottom',
									labels: {
										font: {
											family: "'Roboto Mono', monospace",
											size: 14,
											weight: 'bold'
										},
										color: '#000'
									}
								},
								tooltip: {
									callbacks: {
										label: function(context) {
											return context.label + ': ' + context.parsed + ' Jiwa';
										}
									}
								}
							}
						}
					};

					new Chart(ctx, config);
				</script>
			</body>
			<br><br>
			<div style="border-bottom: 2px solid #f87171; width: 100%; margin-top: 5px;"></div>
			<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>

			<h2 class="text-[#D93B30] font-bold text-xl sm:text-2xl mt-12 mb-4">
				Berdasarkan Pekerjaan
			</h2>

			<div class="overflow-x-auto rounded-md shadow-md">
				<table class="min-w-full text-left text-sm text-gray-700">
					<thead>
						<tr class="bg-[#F87171] text-white font-semibold text-sm">
							<th class="px-4 py-3 whitespace-nowrap">Jenis Pekerjaan</th>
							<th class="px-4 py-3 whitespace-nowrap text-right">Jumlah</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200 max-h-48 overflow-y-auto scrollbar-thin">
						<tr>
							<td class="px-4 py-3 whitespace-nowrap">Sudah tamat pendidikan </td>
							<td class="px-4 py-3 whitespace-nowrap text-right">3720</td>
						</tr>
						<tr>
							<td class="px-4 py-3 whitespace-nowrap">Belum tamat pendidikan</td>
							<td class="px-4 py-3 whitespace-nowrap text-right">966</td>
						</tr>
						<tr>
							<td class="px-4 py-3 whitespace-nowrap">Wiraswasta</td>
							<td class="px-4 py-3 whitespace-nowrap text-right">602</td>
						</tr>
						<tr>
							<td class="px-4 py-3 whitespace-nowrap">PNS</td>
							<td class="px-4 py-3 whitespace-nowrap text-right">26</td>
						</tr>
						<tr>
							<td class="px-4 py-3 whitespace-nowrap">TNI-Polri</td>
							<td class="px-4 py-3 whitespace-nowrap text-right">11</td>
						</tr>
						<tr>
							<td class="px-4 py-3 whitespace-nowrap">Petani/Pekebun</td>
							<td class="px-4 py-3 whitespace-nowrap text-right">1299</td>
						</tr>
						<tr>
							<td class="px-4 py-3 whitespace-nowrap">Lain-Lain</td>
							<td class="px-4 py-3 whitespace-nowrap text-right">2782</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br><br>
			<div style="border-bottom: 2px solid #f87171; width: 100%; margin-top: 5px;"></div>
			<br><br>

			<body class="bg-[#f5f7f5] p-6">
				<div class="max-w-5xl mx-auto">
					<h1 class="text-2xl font-extrabold text-[#e94b3c] mb-6">
						Berdasarkan Agama
					</h1>
					<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
						<div class="bg-white rounded-lg p-5 shadow-sm flex items-center space-x-4">
							<img alt="Green mosque with three domes and crescent moons on top" class="w-12 h-12 flex-shrink-0" height="48" src="https://storage.googleapis.com/a1aa/image/afc668ec-eabe-46a0-b693-abb9939e1aca.jpg" width="48" />
							<div>
								<p class="text-gray-600 text-base">
									Islam
								</p>
								<p class="text-[#e94b3c] font-semibold text-xl leading-none mt-1">

									0 </p>
							</div>
						</div>
						<div class="bg-white rounded-lg p-5 shadow-sm flex items-center space-x-4">
							<img alt="Green Christian cross icon" class="w-12 h-12 flex-shrink-0" height="48" src="https://storage.googleapis.com/a1aa/image/d3ac17d3-0460-46f1-20d5-c195c7ef8b54.jpg" width="48" />
							<div>
								<p class="text-gray-600 text-base">
									Kristen
								</p>
								<p class="text-[#e94b3c] font-semibold text-xl leading-none mt-1">
									0
								</p>
							</div>
						</div>
						<div class="bg-white rounded-lg p-5 shadow-sm flex items-center space-x-4">
							<img alt="Green closed Bible with a cross on the cover" class="w-12 h-12 flex-shrink-0" height="48" src="https://storage.googleapis.com/a1aa/image/4d53f546-c75b-493a-0e9a-361d62f3dfc1.jpg" width="48" />
							<div>
								<p class="text-gray-600 text-base">
									Katolik
								</p>
								<p class="text-[#e94b3c] font-semibold text-xl leading-none mt-1">
									0
								</p>
							</div>
						</div>
						<div class="bg-white rounded-lg p-5 shadow-sm flex items-center space-x-4">
							<img alt="Green Hindu Om symbol" class="w-12 h-12 flex-shrink-0" height="48" src="https://storage.googleapis.com/a1aa/image/165f366d-a019-405f-8fb8-a013a8d9a400.jpg" width="48" />
							<div>
								<p class="text-gray-600 text-base">
									Hindu
								</p>
								<p class="text-[#e94b3c] font-semibold text-xl leading-none mt-1">
									0
								</p>
							</div>
						</div>
						<div class="bg-white rounded-lg p-5 shadow-sm flex items-center space-x-4">
							<img alt="Green lotus flower with yellow sun above" class="w-12 h-12 flex-shrink-0" height="48" src="https://storage.googleapis.com/a1aa/image/4d31efc4-f23f-4b60-477d-1b8ab6713db5.jpg" width="48" />
							<div>
								<p class="text-gray-600 text-base">
									Buddha
								</p>
								<p class="text-[#e94b3c] font-semibold text-xl leading-none mt-1">
									0
								</p>
							</div>
						</div>
						<div class="bg-white rounded-lg p-5 shadow-sm flex items-center space-x-4">
							<img alt="Green Torii gate with yellow feet" class="w-12 h-12 flex-shrink-0" height="48" src="https://storage.googleapis.com/a1aa/image/43358b8b-07cf-4ead-b603-c8df6d2ba5f6.jpg" width="48" />
							<div>
								<p class="text-gray-600 text-base">
									Konghucu
								</p>
								<p class="text-[#e94b3c] font-semibold text-xl leading-none mt-1">
									0
								</p>
							</div>
						</div>
						<div class="bg-white rounded-lg p-5 shadow-sm flex items-center space-x-4">

							<div>
							</div>
						</div>
					</div>
				</div>
			</body>
</body>
</body>
</body>
<footer class="bg-gradient-to-r from-steelblue to-skyblue text-white py-8">
	<div>
		<!-- Info Desa -->
		<div>
			<h2 class="text-xl font-semibold mb-2">Desa Bogorejo</h2>
			<p class="text-sm">Jl. Raya Bogorejo No. 01<br>Kabupaten Pesawaran</p>
			<p class="text-sm mt-2">Email: info@desabogorejo.go.id<br>Telp: (0721) 123456</p>
		</div>
	</div>

	<div class="border-t border-green-500 mt-8 pt-4 text-center text-sm">
		&copy; 2025 Desa Bogorejo. All rights reserved.
	</div>
</footer>

</html>