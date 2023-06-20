


<img id="imagePreview" class="mt-3 img-fluid rounded-circle" 
            src="<?php
                $iprofile_pic = !empty($profile_pic) ? "data:image/png;base64," . $profile_pic : "../img/emptyprofile.png";
                 echo $iprofile_pic;
            ?>" alt="Preview">