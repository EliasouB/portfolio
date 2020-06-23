$(".portfolio-link").on('click', function (event) {
    event.preventDefault();
    let link = this.getAttribute('href');
    $.get(link, function (data) {
        $('.portfolio-title').empty().append(data.title);
        $('.portfolio-subtitle').empty().append(data.subtitle);
        $('.portfolio-image').attr('src', data.image);
        $('.portfolio-content').empty().append(data.content);
        $('.portfolio-url').attr('href', data.url);

        $('#portfolioModal').modal('show')

    })
})