	
	<form id="form-add" class="forms">
		
		<div>
			<label for="pname"> Product Name</label>
			<input type="text" name="pname" id="pname" required>
		</div>
		<div>
			<label for="price"> Price </label>
			<input type="text" name="price" id="price" required pattern="^[0-9]\d*(\.\d+)?$">
		</div>
		<div>
			<label for="stock"> Stock </label>
			<input type="text" name="stock" id="stock" required pattern="^[0-9]*$">
		</div>
		<div>
			<label> &nbsp; </label>
			<input type="submit" name="save" id="save" value="SAVE">
		</div>

		<span class="close-overlay hover-pointer"> close </span>

	</form>

	<form id="form-update" class="forms">
		
		<input type="hidden" name="pid" id="pid">
		<div>
			<label for="pname"> Product Name</label>
			<input type="text" name="pname" id="pname">
		</div>
		<div>
			<label for="price"> Price </label>
			<input type="text" name="price" id="price" required pattern="^[0-9]\d*(\.\d+)?$">
		</div>
		<div>
			<label for="stock"> Stock </label>
			<input type="text" name="stock" id="stock" required pattern="^[0-9]*$">
		</div>
		<div>
			<label> &nbsp; </label>
			<input type="submit" name="update" id="update" value="UPDATE">
		</div>

		<span class="close-overlay hover-pointer"> close </span>

	</form>