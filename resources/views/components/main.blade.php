<main class="grid grid-rows-[auto,1fr,auto]">
	{{-- Top --}}
	<div class="bg-pink-500 grid grid-cols-[10px,90px,1fr,90px,10px]">
		<div></div>

		{{-- Top Left Corner --}}
		<div class="grid grid-rows-[10px,auto]">
			<div></div>
			<div class="grid grid-cols-[30px,30px,30px] grid-rows-[30px,30px,30px]">
				<div class="border-yellow-400 border-t-4 border-l-4"></div>
				<div class="border-yellow-400 border-t-4 border-r-4"></div>
				<div class="border-yellow-400 border-r-4"></div>

				<div class="border-yellow-400 border-b-4 border-l-4"></div>
				<div class="border-yellow-400 border-4"></div>
				<div class="border-yellow-400 border-y-4 border-r-4"></div>

				<div class="border-yellow-400 border-b-4"></div>
				<div class="border-yellow-400 border-x-4 border-b-4"></div>
				<div></div>
			</div>
		</div>

		<div class="grid grid-rows-[10px,30px,30px,20px]">
			<div></div>
			<div class="border-yellow-400 border-y-4"></div>
			<div></div>
			<div></div>
		</div>

		{{-- Top right Corner --}}
		<div class="grid grid-rows-[10px,auto]">
			<div></div>
			<div class="grid grid-cols-[30px,30px,30px] grid-rows-[30px,30px,30px]">
				<div class="border-yellow-400 border-t-4 border-l-4"></div>
				<div class="border-yellow-400 border-t-4 border-r-4"></div>
				<div class="border-yellow-400 border-r-4"></div>

				<div class="border-yellow-400 border-b-4 border-l-4"></div>
				<div class="border-yellow-400 border-4"></div>
				<div class="border-yellow-400 border-y-4 border-r-4"></div>

				<div class="border-yellow-400 border-b-4"></div>
				<div class="border-yellow-400 border-x-4 border-b-4"></div>
				<div></div>
			</div>
		</div>

		<div></div>
	</div>


	{{-- Center --}}
	<div class="bg-green-500 grid grid-cols-[10px,30px,1fr,30px,10px]">
		<div></div>
		<div class="border-yellow-400 border-x-4"></div>
		<div class="">
			<div>{{$slot}}</div>
		</div>
		<div class="border-yellow-400 border-x-4"></div>
		<div></div>
	</div>

	{{-- Bottom --}}
	<div class="bg-purple-700 h-[90px] grid grid-cols-[10px,30px,1fr,30px,10px]">
		<div></div>
		<button>test</button>

		<div class="grid grid-rows-[20px,30px,30px,10px]">
			<div></div>
			<div></div>
			<div class="border-yellow-400 border-y-4"></div>
			<div></div>
		</div>

		<button>test</button>
		<div></div>
	</div>

</main>