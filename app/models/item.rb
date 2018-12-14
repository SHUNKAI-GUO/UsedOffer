class Item < ApplicationRecord
  belongs_to :user
  mount_uploader :picture, PictureUploader
  
  validates :name, presence: true
  validates :price, presence: true
  validates :description, presence: true
  validates :category, presence: true
  validates :condition, presence: true
end
