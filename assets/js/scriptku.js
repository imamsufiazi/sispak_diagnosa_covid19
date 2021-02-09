$(function () {
    $('#image').on('change', function () {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

    $('#bangun-datar, #dosenpa, #prodi, #penyakit').chosen();
    function OnloadFunction() {
        $('#bangun-datar').change(function () {
            var bangunDatar = $(this).val();
            $.ajax({
                url: 'http://localhost/bangundatar/home/viewLuas',
                data: {
                    bangunDatar: bangunDatar
                },
                method: 'post',
                success: function (data) {
                    $('#hitung').html(data);

                    // persegi panjang
                    $(document).ready(function () {
                        $('#p-persegi-panjang').on('keyup', function () {
                            p = $(this).val();
                            l = $('#l-persegi-panjang').val();
                            $.ajax({
                                url: 'http://localhost/bangundatar/home/hitungLuas',
                                data: { p: p, l: l, bangunDatar: bangunDatar },
                                method: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    $('#luas-persegi-panjang').html(data);
                                    previewPersegiPanjang(p, l);
                                }
                            });
                        });

                        $('#l-persegi-panjang').on('keyup', function () {
                            l = $(this).val();
                            p = $('#p-persegi-panjang').val();
                            $.ajax({
                                url: 'http://localhost/bangundatar/home/hitungLuas',
                                data: { p: p, l: l, bangunDatar: bangunDatar },
                                method: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    $('#luas-persegi-panjang').html(data);
                                    previewPersegiPanjang(p, l);
                                }
                            });
                        });
                        function previewPersegiPanjang(p, l) {
                            $('#preview').css("height", l + 'cm');
                            $('#preview').css("width", p + 'cm');
                        }
                    });

                    // persegi
                    $(document).ready(function () {
                        $('#p-persegi').on('keyup', function () {
                            s = $(this).val();
                            $.ajax({
                                url: 'http://localhost/bangundatar/home/hitungLuas',
                                data: { s: s, bangunDatar: bangunDatar },
                                method: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    $('#luas-persegi').html(data);
                                    previewPersegi(s);
                                }
                            });
                        });
                        function previewPersegi(s) {
                            $('#preview').css("height", s + 'cm');
                            $('#preview').css("width", s + 'cm');
                        }
                    });

                    // segitiga
                    $(document).ready(function () {
                        $('#a-segitiga').on('keyup', function () {
                            a = $(this).val();
                            t = $('#t-segitiga').val();
                            $.ajax({
                                url: 'http://localhost/bangundatar/home/hitungLuas',
                                data: { a: a, t: t, bangunDatar: bangunDatar },
                                method: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    $('#luas-segitiga').html(data);
                                    previewSegitiga(a, t);
                                }
                            });
                        });
                        $('#t-segitiga').on('keyup', function () {
                            t = $(this).val();
                            a = $('#a-segitiga').val();
                            $.ajax({
                                url: 'http://localhost/bangundatar/home/hitungLuas',
                                data: { a: a, t: t, bangunDatar: bangunDatar },
                                method: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    $('#luas-segitiga').html(data);
                                    previewSegitiga(a, t);
                                }
                            });
                        });
                        function previewSegitiga(a, t) {
                            $('#preview').css("background-color", 'rgba(255,255,255,0)');
                            $('#preview').css("height", '0');
                            $('#preview').css("width", '0');
                            $('#preview').css("border-left", a / 2 + 'cm solid transparent');
                            $('#preview').css("border-right", a / 2 + 'cm solid transparent');
                            $('#preview').css("border-bottom", t + 'cm solid #3CB371');
                        }
                    });

                    // lingkaran
                    $(document).ready(function () {
                        $('#r-lingkaran').on('keyup', function () {
                            r = $(this).val();
                            $('#d-lingkaran').val(r * 2);
                            $.ajax({
                                url: 'http://localhost/bangundatar/home/hitungLuas',
                                data: { r: r, bangunDatar: bangunDatar },
                                method: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    $('#luas-lingkaran').html(data);
                                    previewLingkaran(r);
                                }
                            });
                        });

                        $('#d-lingkaran').on('keyup', function () {
                            d = $(this).val();
                            $('#r-lingkaran').val(d / 2);
                            r = $('#r-lingkaran').val();
                            $.ajax({
                                url: 'http://localhost/bangundatar/home/hitungLuas',
                                data: { r: r, bangunDatar: bangunDatar },
                                method: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    $('#luas-lingkaran').html(data);
                                    previewLingkaran(r);
                                }
                            });
                        });
                        function previewLingkaran(r) {
                            $('#preview').css("background-color", '#3CB371');
                            $('#preview').css("height", r * 2 + 'cm');
                            $('#preview').css("width", r * 2 + 'cm');
                            $('#preview').css("border-radius", '50%');
                        }
                    });

                }
            });
        })

    }
    $(document).ready(OnloadFunction);

});