function TableMultiplication(N)
{
    for (i=1; i<=10; i++)
    {
        let newelem = document.createElement('p');
        newelem.innerHTML = i + ' x ' + N + ' = ' + i*N  ;
        document.getElementById('mydiv').appendChild(newelem);
    }
}

TableMultiplication(7);