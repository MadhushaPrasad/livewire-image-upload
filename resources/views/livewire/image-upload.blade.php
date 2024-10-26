<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="mt-5 customer-preview-image-bg">
            @if ($loadImage)
                <img src="{{ asset($profileImage) }}" alt="uLogo" class="object-cover rounded-full w-[198px] h-[198px]">
            @elseif ($profileImage !== null)
                <img src="{{ $profileImage->temporaryUrl() }}" alt="Logo"
                    class="object-cover rounded-full w-[198px] h-[198px]">
            @else
                <img src="{{ asset('images/customer-preview.png') }}" alt="Logo" class="customer-preview-image">
            @endif
        </div>
        <!-- Image Upload Section -->
        <div id="dropped-image-div"
            class="hidden mb-5 text-center border-2 border-green-600 border-dotted w-60 h-60 rounded-xl bg-whiter">
            <input type="file" name="profileImage" id="profile-upload" class="hidden" wire:model='profileImage'
                accept="image/*" />
        </div>
        <div class="w-full mb-6" id="drag-drop-main-div">
            <label for="profile-upload" class="block mb-2 text-sm text-[#1E293B] font-open-sans font-semibold">
                Profile Image
            </label>
            <div id="drag-drop-section"
                class="w-full h-40 py-10 text-center bg-white border-2 border-green-600 border-dotted cursor-pointer rounded-xl">
                <img id="uploadIcon" src="{{ asset('images/upload.svg') }}" alt="upload" class="mx-auto mb-6" />
                @if ($profileImage)
                    <label id="dagDropLabel" class="mt-2 text-[#64748B]">Your file is uploaded.</label>
                @else
                    <label id="dagDropLabel" class="mt-2 text-[#64748B]">Drag and drop your Profile Image or browse
                        your Profile Image</label>
                @endif
            </div>
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
    const dragDropSection = document.getElementById('drag-drop-section');
    const dagDropLabel = document.getElementById('dagDropLabel');
    const uploadIcon = document.getElementById('uploadIcon');
    const profileImage = document.getElementById('profile-upload');

    // drag & drop section's click event function start

    dragDropMainDiv.addEventListener('click', (e) => {
        e.preventDefault();
        profileImage.click();
        profileImage.addEventListener('change', (e) => {
            dagDropLabel.innerText = 'Your file is uploaded.';
        });
    });

    // drag & drop section's click event function end

    // drag & drop section's function start
    dragDropMainDiv.addEventListener('dragover', (e) => {
        e.preventDefault();
        dragDropSection.classList.add('border-white');
        dragDropSection.classList.remove('bg-white');
        dragDropSection.classList.add('bg-green-500');
        dagDropLabel.innerText = 'Your file is ready to drop.';
        dagDropLabel.classList.add('text-white');
        uploadIcon.src = '{{ asset('images/upload-white.svg') }}';
    });

    dragDropMainDiv.addEventListener('dragleave', () => {
        dragDropMainDiv.classList.remove('border-green-600');
        dagDropLabel.innerText = 'Your file is not dropped yet.';
    });

    dragDropMainDiv.addEventListener('drop', (e) => {
        e.preventDefault();
        dragDropMainDiv.classList.remove('border-green-600');
        @this.upload('profileImage', e.dataTransfer.files[0]);
        dagDropLabel.innerText = 'Your file is dropped.';
    });
    // drag & drop section's function end
</script>
