import face_recognition
import sys
import numpy as np
import os
# img_original = str(sys.argv[1])
# img_sample = str(sys.argv[2])
# print(os.path.basename(path))
face_image = face_recognition.load_image_file('オリジナルの画像')
face_encoding = face_recognition.face_encodings(face_image)[0]

# 既知の顔符号化方式とその名称の配列の作成
known_face_encodings = [
    face_encoding
]
known_face_names = [
    "suzu"
]

# いくつかの変数を初期化する
face_locations = []
face_encodings = []
face_names = []


# ビデオの現在のフレームに含まれるすべての顔と顔符号化を検索する
app_image = face_recognition.load_image_file('検索したい画像')
face_locations = face_recognition.face_locations(app_image)
face_encodings = face_recognition.face_encodings(app_image, face_locations)

face_names = []
for face_encoding in face_encodings:
    # 顔が既知の顔と一致するかどうかを確認します。
    matches = face_recognition.compare_faces(known_face_encodings, face_encoding)
    name = "Unknown"

    # known_face_encodingsにマッチするものがあった場合、最初のものを使うだけです。
    if True in matches:
        first_match_index = matches.index(True)
        name = known_face_names[first_match_index]
    # または、その代わりに、新しい顔との距離が最も小さい既知の顔を使用します。
    face_distances = face_recognition.face_distance(known_face_encodings, face_encoding)
    for face_echo in face_distances:
      if face_echo <= 0.45 :
        print(face_echo)
        print('\n')
      print(face_echo)