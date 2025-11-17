<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card" style="background-color: #091b29;">
            <img src="images/<?php echo $game['image']; ?>" class="card-img-top" style="object-fit: cover; height: 300px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $game['game_name']; ?></h5>
                <p class="card-text"><?php echo $game['description']; ?></p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item h5 text-primary" style="background-color: #091b29;">Rp.<?php echo $game['price']; ?> Rupiah</li>
                </ul>
            </div>
        </div>
    </div>
    <h1 class="text-center">Pembayaran anda akan di verifikasi oleh Admin</h1>
</div>



