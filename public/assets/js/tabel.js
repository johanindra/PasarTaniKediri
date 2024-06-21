// document.addEventListener('DOMContentLoaded', function() {
//     var table = document.getElementById('myTable');
//     var rows = table.getElementsByTagName('tr');

//     for (var i = 1; i < rows.length; i++) {
//         var cells = rows[i].getElementsByTagName('td');
//         var numberCell = cells[0]; // Sel untuk nomor urut

//         // Periksa apakah sel untuk nomor urut kosong
//         if (numberCell.textContent.trim() === "") {
//             numberCell.textContent = i;
//         }

//         // Jika NIK kosong, geser nomor urut ke kolom NIK
//         var nikCell = cells[1]; // Sel untuk NIK
//         if (nikCell.textContent.trim() === "") {
//             nikCell.textContent = numberCell.textContent;
//             numberCell.textContent = ""; // Kosongkan nomor urut
//         }
//     }
// });

// tabel untuk pengajuan
$(document).ready(function () {
    // Inisialisasi DataTables dengan konfigurasi kolom pencarian
    var table = $("#example").DataTable({
        scrollX: true, // Menambahkan fungsi gulir horizontal
        columns: [
            null, // Kolom nomor urut
            {
                searchable: true,
            }, // Kolom NIK
            {
                searchable: true,
            }, // Kolom Nama Lengkap
            {
                searchable: true,
            }, // Kolom RT/RW
            {
                searchable: true,
            }, // Kolom Tanggal Laporan
            {
                searchable: false,
            },
        ],
        language: {
            zeroRecords: "Tidak ada data yang sesuai dengan pencarian",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(disaring dari _MAX_ data keseluruhan)",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "next",
                previous: "previous",
            },
        },
    });
    $("#example_filter label")
        .contents()
        .filter(function () {
            return this.nodeType === 3;
        })
        .replaceWith("Cari: ");

    // Tambahkan fungsi pencarian
    $("#searchInput").on("keyup", function () {
        table.search(this.value).draw();
    });
    // Tambahkan teks di bawah kolom pencarian
    // $(".dataTables_filter").before(
    //     '<div class="search-text"><small>Cari berdasarkan NIK dan Nama Lengkap</small></div>'
    // );
    $(".search-text").css("text-align", "right");
});

// tabel untuk kabar desa
$(document).ready(function () {
    // Inisialisasi DataTables dengan konfigurasi kolom pencarian
    var table = $("#kabardesa").DataTable({
        scrollX: true, // Menambahkan fungsi gulir horizontal
        columns: [
            null, // Kolom nomor urut
            {
                searchable: true,
            }, // judul
            {
                searchable: true,
            }, // tanggal mulai
            {
                searchable: false,
            }, // tanggal selesai
            {
                searchable: false,
            }, // aksi
        ],
        language: {
            zeroRecords: "Tidak ada data yang sesuai dengan pencarian",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(disaring dari _MAX_ data keseluruhan)",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "next",
                previous: "previous",
            },
        },
    });
    $("#example_filter label")
        .contents()
        .filter(function () {
            return this.nodeType === 3;
        })
        .replaceWith("Cari: ");

    // Tambahkan fungsi pencarian
    $("#searchInput").on("keyup", function () {
        table.search(this.value).draw();
    });
    // Tambahkan teks di bawah kolom pencarian
    // $(".dataTables_filter").before(
    //     '<div class="search-text"><small>Cari berdasarkan NIK dan Nama Lengkap</small></div>'
    // );
    $(".search-text").css("text-align", "right");
});

// tabel untuk laporan
$(document).ready(function () {
    // Inisialisasi DataTables dengan konfigurasi kolom pencarian
    var table = $("#laporan").DataTable({
        scrollX: true, // Menambahkan fungsi gulir horizontal
        columns: [
            null, // Kolom nomor urut
            {
                searchable: true,
            }, // nik
            {
                searchable: true,
            }, // nama lengkap
            {
                searchable: true,
            }, // tipe surat
            {
                searchable: false,
            }, // tanggal pengajuan
            {
                searchable: true,
            }, // status
            {
                searchable: false,
            }, // aksi
        ],
        language: {
            zeroRecords: "Tidak ada data yang sesuai dengan pencarian",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
            infoFiltered: "(disaring dari _MAX_ data keseluruhan)",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "next",
                previous: "previous",
            },
        },
    });
    $("#example_filter label")
        .contents()
        .filter(function () {
            return this.nodeType === 3;
        })
        .replaceWith("Cari: ");

    // Tambahkan fungsi pencarian
    $("#searchInput").on("keyup", function () {
        table.search(this.value).draw();
    });
    // Tambahkan teks di bawah kolom pencarian
    // $(".dataTables_filter").before(
    //     '<div class="search-text"><small>Cari berdasarkan NIK dan Nama Lengkap</small></div>'
    // );
    $(".search-text").css("text-align", "right");
});
