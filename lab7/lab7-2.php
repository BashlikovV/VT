<main>
    <section>
        <h2>Приложение для выкачивания изображений</h2>
        <div class="container">
            <div class="main-block">
                <div class="contact-form">
                    <form method="post">
                        <div class="form-inner">
                            <label for="url"><b>URL</b></label>
                            <label>
                                <input type="text" placeholder="Введите URL" name="url" value="" required>
                            </label>
                            <button type="submit" name="btn" class="send-button">Скачать</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</main>

<?php
function downloadImages($url, $path)
{
    $html = file_get_contents($url);
    preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/i', $html, $images, PREG_SET_ORDER);

    foreach ($images as $image) {
        $imgSrc = $image[1];
        $imageName = basename($imgSrc);

        // Create the directory based on the site structure
        $siteStructure = parse_url($url, PHP_URL_PATH);
        $siteStructure = rtrim($siteStructure, '/');
        $imageDirectory = $path . $siteStructure;
        if (!is_dir($imageDirectory)) {
            mkdir($imageDirectory, 0777, true);
        }

        // Download and save the image
        $imagePath = $imageDirectory . '/' . $imageName;
        if (!file_exists($imagePath)) {
            file_put_contents($imagePath, file_get_contents($imgSrc));
        }
    }
}

if (isset($_POST) && isset($_POST["btn"])) {
    if (isset($_POST["url"])) {
        $url = $_POST["url"];
        $path = './download';

        // Check if the URL is valid
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            // Download images from the main URL
            downloadImages($url, $path);

            // Parse subpages and download images
            $html = file_get_contents($url);
            preg_match_all('/<a.*?href=["\'](.*?)["\'].*?>/i', $html, $links, PREG_SET_ORDER);

            foreach ($links as $link) {
                $subpageUrl = $link[1];

                // Check if the subpage URL is valid
                if (filter_var($subpageUrl, FILTER_VALIDATE_URL)) {
                    // Download images from the subpage URL
                    downloadImages($subpageUrl, $path);
                }
            }

            echo "Images downloaded successfully!";
        } else {
            echo "Invalid URL!";
        }
    }
}
?>