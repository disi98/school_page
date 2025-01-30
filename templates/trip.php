<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../statics/css/output/tw_output.css">
    <link rel="icon" href="../statics/img/PCEAschool.png" type="image/icon type">

    <title>Galarry(Trip) - PCEA Schools</title>
 

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>

    <div class="fixed bottom-4 ml-3  bg-blue-800 text-white p-4 rounded-full shadow-lg hover:bg-blue-600 transition-all">
        <a href="gallary.html" class="hover:underline">Back to Galarry</a>
        <a href="service.php" class="hover:underline font-bold px-4">Service</a>
        <a href="stuff.php" class="hover:underline font-bold">Stuff</a>        
    </div>


    <section class="mx-auto  bg-gray-400 grid justify-items-center">
        <div class="flex container my-12 bg-gray-200 flex-wrap justify-between items-center p-4">
            <!-- Lightbox Container -->
            <div id="lightbox" class="hidden fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4 cursor-pointer">
                <img id="lightbox-image" class="max-w-full max-h-full rounded-lg" src="">
                <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-4xl">&times;</button>
            </div>

            <?php
                $imageDir = '../statics/img/trips/';

                if (is_dir($imageDir)) {
                    $files = scandir($imageDir);
                    
                    $images = array_filter($files, function($file) {
                        return preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file);
                    });

                    foreach ($images as $filename) {
                        echo '
                        <div class="p-2 flex flex-col items-center">
                            <img class="h-56 max-w-full rounded-lg cursor-zoom-in" 
                                src="' . $imageDir . htmlspecialchars($filename) . '" 
                                alt=""
                                onclick="openLightbox(this.src)"
                                loading="lazy">
                        </div>';
                    }
                } else {
                    echo '<p>Image directory not found</p>';
                }
            ?>
        </div>

    </section>



            
        <script>
        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            lightboxImage.src = src;
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restore scrolling
        }

        // Close lightbox when clicking outside the image
        document.getElementById('lightbox').addEventListener('click', (e) => {
            if (e.target.id === 'lightbox') {
                closeLightbox();
            }
        });

        // Close lightbox with ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !document.getElementById('lightbox').classList.contains('hidden')) {
                closeLightbox();
            }
        });
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>


</body>
</html>