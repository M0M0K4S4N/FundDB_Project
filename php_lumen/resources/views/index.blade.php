@extends('layouts.app')

@section('content')

    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/login';">ล๊อคอิน</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/register';">สมัครสมาชิก</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/menu';">ดูเมนู</button>
    <button type="button" class="btn btn-danger btn-lg btn-block" onclick="location.href='/promotions';">ดูโปรโมชั่น</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/chef-queue';">ดูคิว สำหรับเชฟ</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='manager-menu.html';">ดู เพิ่ม ลด เมนู สำหรับผู้จัดการ</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='manager-promotion.html';">ดู เพิ่ม ลด โปรโมชั่น สำหรับผู้จัดการ</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='manager-worker.html';">ดู เพิ่ม ลด พนักงาน</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='cashier.html';">หน้าคิดเงิน สำหรับโต๊ะแคชเชียร์</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='Delivery.html';">หน้าข้อมูล สำหรับพนักงานDelivery</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='map.html';">หน้าแผนที่</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='waiter.html';">หน้าสำหรับพนักงานเสิร์ฟ</button>

@endsection
