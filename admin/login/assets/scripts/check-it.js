// external js
// https://draggabilly.desandro.com/draggabilly.pkgd.js

// use left/top for all positioning
Draggabilly.prototype.positionDrag = Draggabilly.prototype.setLeftTop;

$( function() {
  $('.knob').each( function( i, knob ) {
    var draggie = new Draggabilly( knob, {
      containment: true,
      axis: 'x'
    });
    draggie.on( 'dragMove', onDragMove );
    draggie.on( 'dragEnd', onDragEnd );
  
  });
});

function onDragMove() {
  var $knob = $( this.element );
  var $label = $knob.parents('label');
  // on initial drag move
  if ( !this.hasDragged ) {
    this.movePotential = $knob.parent().width() - $knob.width();
    $label.on( 'click', onLabelClickDragging );
    this.input = $label.find('input')[0];
    this.hasDragged = true;
  }
  
  var isChecked = this.position.x > this.movePotential / 2;
  this.input.checked = isChecked;
}

// disable label clicks when dragging
function onLabelClickDragging( event ) {
  event.preventDefault();
}

function onDragEnd() {
  // clear out Draggabilly's position setting
  this.element.style.left = '';
  delete this.hasDragged;  
  var $knob = $( this.element );
  var $label = $knob.parents('label');
  setTimeout( function() {
    $label.off( 'click', onLabelClickDragging );
  });
}

