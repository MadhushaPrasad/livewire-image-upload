<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="submit" enctype="multipart/form-data">

        <div id="dropped-image-div"
            class="hidden mb-5 text-center border-2 border-green-600 border-dotted w-fit h-62 rounded-xl bg-whiter">
            <input type="file" name="productImage" id="productImage" class="hidden" wire:model='productImage' />
        </div>
        <div class="w-full mb-6" id="drag-drop-main-div">
            <label for="profile-upload" class="block mb-2 text-sm text-[#1E293B] font-open-sans font-semibold">
                Product Images
            </label>
            <div
                class="w-full h-40 py-10 text-center bg-white border-2 border-green-600 border-dotted cursor-pointer rounded-xl">
                <img src="{{ asset('images/upload.svg') }}" alt="upload" class="mx-auto mb-6" />
                <label class="mt-2 text-[#64748B]">Drag and drop your product images or browse your product
                    images</label>
            </div>

            @error('productImage')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputName">Image</label>
            <input type="file" class="form-control" id="exampleInputName" wire:model="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<script>
    // Drag and Drop Image Upload
    const dragDropMainDiv = document.getElementById('drag-drop-main-div');
    const droppedImageDiv = document.getElementById('dropped-image-div');
    const fileInput = document.createElement('input');
    const exampleInputName = document.getElementById('exampleInputName');

    dragDropMainDiv.addEventListener('click', (e) => {
        e.preventDefault();
        fileInput.type = 'file';
        fileInput.accept = 'image/*';
        fileInput.click();
        fileInput.name = 'productImage';
        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            // 64base code
            const reader = new FileReader();
            reader.onload = () => {
                // remove the previous image
                if (droppedImageDiv.querySelector('img')) {
                    droppedImageDiv.querySelector('img').remove();
                }
                const img = document.createElement('img');
                img.id = 'user-product-image';
                img.classList.add('w-60', 'h-60', 'object-cover', 'rounded-xl');
                img.alt = 'Product Image';
                img.src = '';
                img.src = reader.result;
                droppedImageDiv.appendChild(img);
                droppedImageDiv.classList.remove('hidden');
                dragDropMainDiv.classList.add('block');
                dragDropMainDiv.append(fileInput);
                fileInput.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    });

    dragDropMainDiv.addEventListener('dragover', (e) => {
        e.preventDefault();
        dragDropMainDiv.classList.add('border-red-600');
    });

    dragDropMainDiv.addEventListener('dragleave', () => {
        dragDropMainDiv.classList.remove('border-green-600');
    });

    dragDropMainDiv.addEventListener('drop', (e) => {
        e.preventDefault();
        dragDropMainDiv.classList.remove('border-green-600');
        fileInput.type = 'file';
        fileInput.accept = 'image/*';
        fileInput.click();
        fileInput.name = 'productImage';
        const file = e.dataTransfer.files[0];
        // 64base code
        const reader = new FileReader();
        reader.onload = () => {
            // remove the previous image
            if (droppedImageDiv.querySelector('img')) {
                droppedImageDiv.querySelector('img').remove();
            }
            const img = document.createElement('img');
            img.id = 'user-product-image';
            img.classList.add('w-60', 'h-60', 'object-cover', 'rounded-xl');
            img.alt = 'Product Image';
            img.src = '';
            img.src = reader.result;
            droppedImageDiv.appendChild(img);
            droppedImageDiv.classList.remove('hidden');
            dragDropMainDiv.classList.add('block');
            dragDropMainDiv.append(fileInput);
            fileInput.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    });
</script>
