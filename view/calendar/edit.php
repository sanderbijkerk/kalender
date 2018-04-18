<form action="<?= URL ?>calendar/editSave/<?= $birthday["id"] ?>" method="POST">
	<input type="text" name="name" value="<?= $birthday["name"] ?>">
	<input type="text" name="day" value="<?= $birthday["day"] ?>">
	<input type="text" name="month" value="<?= $birthday["month"] ?>">
	<input type="text" name="year" value="<?= $birthday["year"] ?>">
	<input type="text" name="age" value="<?= $birthday["age"] ?>">
	<input type="hidden" name="id" value="<?= $birthday["id"] ?>">

	<input type="submit" value="Opslaan">
</form>