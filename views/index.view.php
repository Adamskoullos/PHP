        <?php require('partials/header.php'); ?>
        <?php require('partials/nav.php'); ?>
        <header>
            <h1>
                Home Page
            </h1>
            <h3>submit task</h3>
            <form method="POST" action="/names">
                <input name="name"></input>
                <button type="submit">Submit</button>
            </form>
            <?php require('partials/footer.php'); ?>