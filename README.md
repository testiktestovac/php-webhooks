#PHP discord webhooks

Simple class to send spicy discord webhooks


#Documentation

Start by importing
`include "webhooks.php"`

Create a webhook
`new webhook(url)`

Send simple content
method->`set_content(content)`

Send embed
method->`set_embed(title, description, color)`

Embed fileds
method->`embed_field(embed, name, value)`

To send just use this method
`send()`

