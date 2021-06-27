var $items = $('.news-item');

var result = '';

$items.each(function () {
  var $item = $(this);

  var $link = $($item.find('a')[0]);

  var title = $link.attr('title');
  var content = $($item.find('.news-item__sapo')[0]).text();

  var imgSrc = $($item.find('.dt-thumbnail > img')[0]).attr('srcset');

  var href = 'https://dantri.com.vn/' + $link.attr('href');

  var day = moment(
    /(\d+)(?=\.htm)/gm.exec(href)[0],
    'YYYYMMDDHHmmssSSS'
  ).format('YYYY-MM-DD HH:mm:ss.SSS');

  if (imgSrc && content) {
    const userId = 1;
    const cateId = 1;

    // result += `1\t1\t${title?.trim()}\t${content?.trim()}\t0\t${imgSrc?.trim()}\t${href?.trim()}\t${day?.trim()}\r\n`;

    const item = {
      userId,
      cateId,
      title: title?.trim(),
      content: content?.trim(),
      imgSrc: imgSrc?.trim(),
      href: href?.trim(),
      day
    };

    result+=`${item.userId}\t${item.cateId}\t${item.title}\t${item.content}\t0\t${item.imgSrc}\t${item.href}\t${item.day}\r\n`;
  }
});

console.log(result); 
