<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upload Excel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS and DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex w-full items-center justify-center h-screen bg-green-100">
        <button class="btn btn-outline btn-primary" onclick="my_modal_5.showModal()">Upload Excel</button>
    </div>

    <!-- Modal -->
    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Upload Excel File</h3>
            <p class="py-4">Please select an Excel file and provide remarks before uploading.</p>
            <form action="/api/karyawan/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Remarks</span>
                    </label>
                    <input type="text" name="upload_remarks" placeholder="Enter remarks" class="input input-bordered w-full" required />
                </div>
                <div class="form-control mt-4">
                    <label class="label">
                        <span class="label-text">Excel File</span>
                    </label>
                    <input type="file" name="file" accept=".xlsx" class="file-input file-input-bordered w-full" required />
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button class="btn" onclick="my_modal_5.close()">Close</button>
                </div>
            </form>
        </div>
    </dialog>
</body>

</html>
