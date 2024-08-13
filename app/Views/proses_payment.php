<form id="paymentForm">
    <input type="text" id="shippingAddress" name="address" placeholder="Alamat Pengiriman" required>
    <input type="text" id="senderName" name="senderName" placeholder="Nama Pengirim" required>

    <!-- Payment Methods -->
    <label>
        <input type="radio" name="paymentMethod" value="Dana" required> Dana
    </label>
    <label>
        <input type="radio" name="paymentMethod" value="ShopeePay" required> ShopeePay
    </label>
    <!-- Tambah metode pembayaran lain jika perlu -->

    <table id="orderBody">
        <!-- Data pesanan akan diisi di sini -->
    </table>

    <button type="button" onclick="processPayment()">Proses Pembayaran</button>
</form>

<script>
function processPayment() {
    const form = document.getElementById('paymentForm');
    const formData = new FormData(form);
    const orders = [];

    document.querySelectorAll('#orderBody tr').forEach(row => {
        orders.push({
            item: row.cells[1].innerText,
            quantity: row.cells[2].innerText,
            total: row.cells[3].innerText,
            note: row.cells[4].innerText
        });
    });

    fetch('<?php echo site_url('home/processPayment'); ?>', {
        method: 'POST',
        body: JSON.stringify({
            address: formData.get('address'),
            senderName: formData.get('senderName'),
            paymentMethod: formData.get('paymentMethod'),
            orders: orders
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            // Kosongkan form dan tabel pesanan jika perlu
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
