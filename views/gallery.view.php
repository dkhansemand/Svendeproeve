<style>
    /* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 50px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background-color: rgba(0,0,0,.2);
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: transparent;
  height: 80%;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
  text-align: center;
}

#myModal .mySlides img
{
    height: auto;
    width: 80%;
}

</style>
<?php
    $albumId = (int)Router::GetParamByName('ALBUM_ID');
    $galleryData = View::CallModel()->GetGalleryByAlbumId($albumId);

    if(sizeof($galleryData) > 0)
    {
        $filepath = $galleryData[0]->filepath;
        $fullSize = [];
        $thumbnails = [];
    
        foreach($galleryData as $image)
        {
            $filenameSplit = explode('_', $image->filename);
            $thumbnails[] = (in_array('200x150', $filenameSplit)) ? $image->filename : null;
            $fullSize[] = (in_array('1200x800', $filenameSplit)) ? $image->filename : null;
        }

    }

?>
<section id="galleriesView">
    <h2>Galleri - <?php if(isset($galleryData[0])){ echo (empty($galleryData[0]->eventTitle) ? $galleryData[0]->albumName : $galleryData[0]->eventTitle); }?></h2>
    <?php
        if(sizeof($galleryData) > 0)
        {
    ?>
        <div class="gallery-grid">
    <?php
            foreach($thumbnails as $idx => $thumbnail)
            {
                if(!is_null($thumbnail))
                {
        ?>
                <div class="album">
                    <img src="<?=Router::$BASE?>assets/media/<?=$filepath.'/'.$thumbnail?>" data-fullsize="<?=Router::$BASE?>assets/media/<?=$filepath.'/'.$fullSize[$idx-1] ?>" alt="<?= empty($galleryData[0]->eventTitle) ? $galleryData[0]->albumName : $galleryData[0]->eventTitle ?>">
                </div>
        <?php
                }
            }
        ?>
        </div>
        <?php
        }else{
        ?>
            <h3>Der valgte galleri har ikke bogle billeder.</h3>
        <?php
        }
    ?>
    <div id="myModal" class="modal">
        <span class="close cursor">&times;</span>
        <div class="modal-content">
            <div class="mySlides">
                <img src="">
            </div>
        </div>
    </div>
</section>
<script>
    ( () => {
        // Open the Modal
        document.addEventListener('DOMContentLoaded', () => {           
            
                document.querySelectorAll('.album').forEach( (elm, idx) => {
                    elm.addEventListener('click', (e) => {
                        document.getElementById('myModal').style.display = "block";
                        document.querySelector('#myModal .mySlides').style.display = 'block'
                        document.querySelector('#myModal .mySlides img').src = e.target.attributes['data-fullsize'].value
                    })
                })
                document.querySelector('#myModal .mySlides img').addEventListener('blur', (e) => {
                    document.querySelector('#myModal').style.display = 'none'
                    document.querySelector('#myModal .mySlides').style.display = 'none'
                })
                
                document.onkeydown = (evt) => {
                    evt = evt || window.event
                    if (evt.keyCode == 27) { 
                        document.querySelector('#myModal').style.display = 'none'
                    }
                }
                document.querySelector('#myModal').addEventListener('click', (e) => {
                    document.querySelector('#myModal').style.display = 'none'
                })
                document.querySelector('.close').addEventListener('click', (e) => {
                    document.getElementById('myModal').style.display = "none";
                })

        })
    })()
</script>