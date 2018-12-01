$(document.documentElement).on('focus', '.add_item, .remove_item', function() {
  var coll = $(this).closest('.collection');

  if (!coll.hasClass('collection-initialised')) {
    new infinite.Collection(
      coll.children('.items'),
      coll.children(':not(.items)').find('.add_item'),
      {
        itemSelector: '.item',
        prototypeName: coll.attr('data-prototype-name'),
        removeSelector: coll.attr('data-remove-selector') || '> .item > td > .remove_item'
      }
    );

    coll.addClass('collection-initialised');
  }
});
