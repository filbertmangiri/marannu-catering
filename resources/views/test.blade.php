<x-app-layout title="Test">
  @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @endpush

  <div class="row justify-content-center">
    <div class="col col-sm-11 col-md-8 col-lg-6">
      <div class="container-fluid border rounded-4 shadow p-3">
        <form action="{{ route('test') }}" method="POST">
          @csrf

          <div class="w-50 mx-auto mb-3">
            <img id="profilePictureImg" src="{{ old('profile_picture_base64') ?? asset('storage/profile-pictures/default' . (old('gender') ? '-' . old('gender') : '') . '.png') }}" title="Upload my profile picture" alt="Profile Photo" role="button" class="img-thumbnail rounded-circle btn w-75 w-sm-25 d-block mx-auto">
            <input type="file" class="d-none" accept="image/*" id="profilePictureInput">
          </div>

          <x-form.floating-input name="full_name" class="mb-4">Full Name</x-form.floating-input>

          <button type="submit" class="btn btn-lg btn-dark rounded-4 d-block w-100">Daftar</button>
        </form>
      </div>
    </div>
  </div>

  @push('modals')
    <div class="modal fade" id="profilePictureModal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="profilePictureModalLabel">Foto Profil</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="" alt="Picture Cropper" class="mw-100" id="profilePictureCropper">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="profilePictureCropperSaveBtn">Selesai</button>
          </div>
        </div>
      </div>
    </div>
  @endpush

  @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
      const __profilePictureImg = document.getElementById('profilePictureImg')
      const __profilePictureInput = document.getElementById('profilePictureInput')
      const __profilePictureBase64 = document.getElementById('profilePictureBase64')
      const __profilePictureModal = document.getElementById('profilePictureModal')
      const profilePictureModal = new bootstrap.Modal('#profilePictureModal', {})
      const __profilePictureCropper = document.getElementById('profilePictureCropper')
      const __profilePictureCropperSaveBtn = document.getElementById('profilePictureCropperSaveBtn')

      let profilePictureCropper
      let profilePictureBlob

      __profilePictureImg.onclick = () => {
        __profilePictureInput.click()
      }

      __profilePictureInput.onchange = () => {
        const files = __profilePictureInput.files

        if (files && files.length > 0) {
          if (URL) {
            __profilePictureCropper.src = URL.createObjectURL(files[0])
            __profilePictureInput.value = ''
          } else
          if (FileReader) {
            const oFReader = new FileReader()

            oFReader.readAsDataURL(files[0])

            oFReader.onload = (oFREvent) => {
              __profilePictureInput.value = ''
              __profilePictureCropper.src = oFREvent.target.result
            }
          }

          profilePictureModal.show()
        }
      }

      __profilePictureModal.addEventListener('shown.bs.modal', () => {
        profilePictureCropper = new Cropper(__profilePictureCropper, {
          aspectRatio: 1,
          viewMode: 3
        })
      })

      __profilePictureModal.addEventListener('hidden.bs.modal', () => {
        profilePictureCropper.destroy()
        profilePictureCropper = null
      })

      __profilePictureCropperSaveBtn.onclick = async () => {
        profilePictureModal.hide()

        if (profilePictureCropper) {
          const canvas = profilePictureCropper.getCroppedCanvas({
            width: 160,
            height: 160
          })

          __profilePictureImg.src = canvas.toDataURL()

          profilePictureBlob = await new Promise((resolve) => {
            return canvas.toBlob((blob) => {
              return resolve(blob)
            })
          })


        }
      }
    </script>
  @endpush
</x-app-layout>
