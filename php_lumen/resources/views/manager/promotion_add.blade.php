@extends('layouts.app')

@section('content')

<form method="post" action="/manager-promotion/promotion-add-store">
<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name"  placeholder="name" required>
</div>
<div class="form-group">
  <label for="discount_for">Discount_for</label>
  <br>
	 <select name="discount_for">
		<option value="1">��ʹ</option>
		<option value="2">����ӡ��</option>
		<option value="3">�ټѴ��������</option>
		<option value="4">�ù�����</option>
		<option value="5">��</option>
		<option value="6">��ȡ����з�</option>
	  </select>
  <br>
</div>
<div class="form-group">
  <label for="discount_value">Discount_value</label>
  <input type="number" class="form-control" name="discount_value"  placeholder="percent" required>
</div>
<div class="form-group">
  <label for="start_date">Start_Date</label>
  <input type="date" class="form-control" name="start_date"  placeholder="start" required>
</div>
<div class="form-group">
  <label for="end_date">End_Date</label>
  <input type="date" class="form-control" name="end_date"  placeholder="end" required>
</div>

<button type="submit" class="btn btn-primary">Add</button>
  <button type="reset" class="btn pull-right">Cancel</button>
</form>

@endsection
