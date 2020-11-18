

fetch('http://localhost:9000/BD/IntroPDO/api')
    .then(response => response.json())
    .then(data => {
        view = listView(data)
        print(view);
    });

const print = (view) => {
    document.getElementById('list').innerHTML = view;
}

const listView = (data) => {
    view = ''

    data.forEach(item => {
        view += `<li>${item.id} - ${item.name} - At: ${item.createdAt}</li>`
    });

    return view;
}
