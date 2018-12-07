let orderStatus = document.querySelectorAll( '#orderStatusAdmin' )
let selectStatus = document.querySelectorAll( '#selectStatus' )
console.log( orderStatus.length )

for ( let i = 0; i <= orderStatus.length; i++) {
      if ( orderStatus[i].textContent === 'Delivered' ) {
            selectStatus[i].disabled = true
      }
}
