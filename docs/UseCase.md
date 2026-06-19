# Use Case Diagram

```mermaid
usecaseDiagram
    actor Customer
    actor Admin

    rectangle "RentCar System" {
        usecase "Registrasi Akun" as UC1
        usecase "Login / Logout" as UC2
        usecase "Lihat Kendaraan" as UC3
        usecase "Booking Kendaraan" as UC4
        usecase "Upload Bukti Pembayaran" as UC5
        usecase "Lihat Riwayat Booking" as UC6
        
        usecase "Kelola Kendaraan" as UC7
        usecase "Kelola Kategori" as UC8
        usecase "Kelola Pengguna" as UC9
        usecase "Verifikasi/Tolak Pembayaran" as UC10
        usecase "Cetak Laporan Transaksi" as UC11
    }

    Customer --> UC1
    Customer --> UC2
    Customer --> UC3
    Customer --> UC4
    Customer --> UC5
    Customer --> UC6

    Admin --> UC2
    Admin --> UC7
    Admin --> UC8
    Admin --> UC9
    Admin --> UC10
    Admin --> UC11
```
