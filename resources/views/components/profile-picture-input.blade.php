<div class="w-[80px] lg:w-[120px] text-center  relative h-[80px]">
    <div class="w-[80px] lg:w-[120px]">
        <img id="profilePictureInputShow" class="w-[80px] h-[80px] lg:w-[120px] lg:h-[120px] rounded-full absolute object-cover object-center"
            src="{{ $image ? $image : asset('images/default-profile-picture.webp') }}" alt="" />
        <label for="profilePictureInput"
            class="w-[80px] h-[80px] lg:w-[120px] lg:h-[120px] group hover:bg-gray-200 opacity-60 rounded-full absolute flex justify-center items-center cursor-pointer transition duration-500">
            <img class="hidden group-hover:block w-8" src="https://www.svgrepo.com/show/33565/upload.svg"
                alt="" />
        </label>
        <input type="file" name="profilePicture" class="hidden" id="profilePictureInput" />
    </div>
</div>

<script>
    const profilePictureInput = document.getElementById('profilePictureInput');
    const profilePictureInputShow = document.getElementById('profilePictureInputShow');

    profilePictureInput.addEventListener('change', function(e) {
        file = e.target.files[0];
        profilePictureInputShow.src = URL.createObjectURL(file)
    })
</script>