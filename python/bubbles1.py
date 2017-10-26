import bubbles
p = bubbles.Piclearpeline()
p.source(bubbles.data_object('csv_source','zoo.csv',infer_fields=True))
p.aggregate('animal','hush')
p.pretty_print()