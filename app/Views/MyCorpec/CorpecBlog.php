<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>

<main class="mt-5 pt-4 ">
    <div class="container d-flex align-items-center justify-content-center">

        <div class="col-md-12 my-4">
            <?php foreach ($news as $n) : ?>
                <?php
                // Strip undesired tags
                $description = strip_tags($n['news_description'], '<p><b><i><a><figure>');

                // Find all paragraphs
                preg_match_all('/<p>(.*?)<\/p>/', $description, $paragraphs);

                // Initialize the truncated description
                $truncatedDescription = '';
                $found = false;

                foreach ($paragraphs[1] as $paragraph) {
                    // Count words in the paragraph
                    if (str_word_count(strip_tags($paragraph)) > 1) {
                        $words = explode(' ', strip_tags($paragraph));
                        $truncatedDescription = implode(' ', array_slice($words, 0, 50)) . '... <a href="/CorpecBlog/' . $n['url_news'] . '/Detail_News">read more</a>';
                        $found = true;
                        break;
                    }
                }

                if (!$found && isset($paragraphs[1][0])) {
                    $truncatedDescription = $paragraphs[1][0];
                }
                $updated_at = strtotime($n['updated_at']);
                $current_time = time();
                $time_difference = $current_time - $updated_at;


                $minutes_ago = floor($time_difference / 60);
                ?>

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">

                            <img src="/assets/images/news/<?= $n['image_news'] ?>" class="img-fluid rounded-start m-2" alt="Corpec Inspeksi Utama <?= $n['news_title'] ?>" style="width: 300px; height:200px;">


                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h1 class="card-title fs-3"><?= $n['news_title'] ?></h1>
                                <p class="card-text"><?= $truncatedDescription ?> </p>
                                <p class="card-text"><small class="text-body-secondary">Last updated <?= $minutes_ago  ?> mins ago</small></p>
                                <div class="d-flex justify-content-end">
                                    <a href="/CorpecBlog/<?= $n['url_news'] ?>/Detail_News" class="btn btn-info mx-2"><i class="bi bi-pencil-square"></i></a>

                                    <form action="/CorpecBlog/Delete_News/<?= $n['news_id'] ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')"><i class="bi bi-archive-fill"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</main>

<?= $this->endSection(); ?>