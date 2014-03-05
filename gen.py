import sys, configparser, time

if len(sys.argv) == 1:
    input_file = "music"
    output_file = "index.html"
elif len(sys.argv) == 2:
    input_file = sys.argv[1]
    output_file = "index.html"
else:
    input_file = sys.argv[1]
    output_file = sys.argv[2]

TIMESTAMP = time.time()

try:
    f_body = open('templates/body.template')
    f_content = open('templates/content.template')
    f_buttons = open('templates/buttons.template')
except:
    print("ABORT: Unable to open templates")
    sys.exit(1)

try:
    f_input = open(input_file)
    f_output = open(output_file, 'w')
except:
    print("ABORT: Unable to open requested files")
    sys.exit(1)


s_body = f_body.read()
s_content = f_content.read()
s_buttons = f_buttons.read()

config = configparser.ConfigParser(interpolation = None)
b_config = configparser.ConfigParser()

config.read(input_file)



main = config[config.sections()[0]]
songs = config.sections()[1:]



content_string = ""
for title in songs:
    button_string = ""
    button_types = config[title]['buttons'].split('\n')
    button_links = config[title]['links'].split('\n')
    button_backs = config[title]['backs'].split('\n')
    b_config.read('templates/buttons.details')
    for i in range(len(button_types)):
        button_type = button_types[i].lower()
        button_link = button_links[i]
        button_back = button_backs[i]
        if button_type in b_config.sections():
            button_icon = b_config[button_type]['icon']
            button_front = b_config[button_type]['front']
            button_class = b_config[button_type]['class']
        else:
            button_class = 'Otherbutton'
            button_icon = 'OtherIcon.png'
            button_front = button_type
        button_string += s_buttons.format(icon = button_icon, front=button_front, url=button_link, b_class = button_class, message = button_back,)


    b_config.read('templates/tags.details')
    song_artwork = config[title]['artwork']
    song_title = title
    song_artist = config[title]['artist']
    song_avatar = config[title]['avatar']
    song_iframe = config[title]['iframe']
    song_comment = config[title]['comment']
    tag_list = config[title]['tags'].split(', ')
    tag_string = ''
    for tag in tag_list:
        if tag in b_config['tags']:
            tag_string += b_config['tags'][tag]
        else:
            if 'acoustic' in tag.lower().split(' ') or 'electronic' in tag.lower().split(' '):
                tag_name = " ".join(tag.split(' ')[1:])
            else:
                tag_name = tag
            tag_string += "<div class='{0!s}'>{1!s}</div>".format(tag.lower(), tag_name)
    content_string += s_content.format(iframe = song_iframe, comment = song_comment, artist = song_artist, buttons = button_string, title = song_title, tags = tag_string, artwork = song_artwork, avatar = song_avatar)

final = s_body.format(subtitle = main['subtitle'], message = main['message'], content = content_string)

f_output.write(final)

print("Success! File '{}' written".format(output_file))

f_body.close()
f_content.close()
f_buttons.close()
f_input.close()
f_output.close()
