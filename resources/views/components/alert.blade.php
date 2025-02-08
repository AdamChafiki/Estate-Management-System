@switch($level)
@case('success')
<div class="bg-green-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
    <svg viewBox="0 0 24 24" class="w-5 h-5 sm:w-5 sm:h-5 mr-3 text-green-800">
        <path fill="currentColor"
            d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
        </path>
    </svg>
    <span class="text-green-800">{{ $message }}</span>
</div>
@break

@case('error')
<div class="bg-red-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor "
        class="w-5 h-5 sm:w-5 sm:h-5 mr-3 text-red-800">
        <path
            d="M12.8659 3.00017L22.3922 19.5002C22.6684 19.9785 22.5045 20.5901 22.0262 20.8662C21.8742 20.954 21.7017 21.0002 21.5262 21.0002H2.47363C1.92135 21.0002 1.47363 20.5525 1.47363 20.0002C1.47363 19.8246 1.51984 19.6522 1.60761 19.5002L11.1339 3.00017C11.41 2.52187 12.0216 2.358 12.4999 2.63414C12.6519 2.72191 12.7782 2.84815 12.8659 3.00017ZM4.20568 19.0002H19.7941L11.9999 5.50017L4.20568 19.0002ZM10.9999 16.0002H12.9999V18.0002H10.9999V16.0002ZM10.9999 9.00017H12.9999V14.0002H10.9999V9.00017Z">
        </path>
    </svg>
    <span class="text-red-800">{{ $message }}</span>
</div>
@break

@default
<div class="bg-gray-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
    <svg viewBox="0 0 24 24" class="w-5 h-5 sm:w-5 sm:h-5 mr-3 text-gray-800">
        <path fill="currentColor" d="M12,2A10,10,0,1,0,22,12,10.011,10.011,0,0,0,12,2Zm1,15H11V11h2Zm0-6H11V7h2Z">
        </path>
    </svg>
    <span class="text-gray-800">{{ $message }}</span>
</div>
@endswitch