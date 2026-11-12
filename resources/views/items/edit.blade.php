<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل العنصر</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">تعديل بيانات العنصر</h2>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">اسم العنصر</label>
            <input type="text" name="name" value="{{ $item->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">الوصف</label>
            <textarea name="description" class="form-control">{{ $item->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">السعر</label>
            <input type="number" step="0.01" name="price" value="{{ $item->price }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</body>
</html>