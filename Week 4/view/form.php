<main class="main-form">
    <h2>Enter a number</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="form-container">
        <input type="text" class="input-box" id="num" name="num" maxlength="2" required placeholder="Enter a number">
        <select name="operation" class="select-box">
            <option value="multiply">Multiplication</option>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="divide">Division</option>
        </select>
        <button class="btn-submit">GO!</button>
    </form>
</main>